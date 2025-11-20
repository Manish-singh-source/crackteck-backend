<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Engineer;
use App\Models\DeliveryMan;
use App\Models\SalesPerson;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;
use App\Services\Fast2smsService;

class ApiAuthController extends Controller
{
    protected $fast2sms;
    public function __construct(Fast2smsService $fast2sms)
    {
        $this->fast2sms = $fast2sms;
    }


    protected function getModelByRoleId($roleId)
    {
        return [
            1 => SalesPerson::class,
            2 => Engineer::class,
            3 => DeliveryMan::class,
        ][$roleId] ?? null;
    }

    public function sendDltSms($phoneNumbers, $templateId, $variablesValues)
    {
        $apiKey = env('FAST2SMS_API_KEY');
        $senderId = env('FAST2SMS_SENDER_ID');

        $payload = [
            'route' => 'dlt',
            'sender_id' => $senderId,
            'message' => $templateId, // Template ID (numeric)
            'variables_values' => $variablesValues, // OTP value
            'flash' => 0,
            'numbers' => is_array($phoneNumbers) ? implode(',', $phoneNumbers) : $phoneNumbers
        ];

        try {
            $response = Http::withHeaders([
                'authorization' => $apiKey,
            ])->asForm()->post('https://www.fast2sms.com/dev/bulkV2', $payload);

            // Log the response for debugging
            Log::info('Fast2SMS Response', [
                'status' => $response->status(),
                'body' => $response->body(),
                'payload' => $payload
            ]);

            if ($response->successful()) {
                $responseData = $response->json();
                return $responseData['return'] ?? false;
            }

            Log::error('Fast2SMS Error', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('Fast2SMS Exception: ' . $e->getMessage());
            return false;
        }
    }


    /**
     * Handle user login and return access token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(Request $request)
    {
        try {
            $request->validate([
                'phone_number' => 'required',
                'role_id' => 'required|in:1,2,3'
            ]);

            $model = $this->getModelByRoleId($request->role_id);
            if (!$model) {
                return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
            }

            $user = $model::where('phone', $request->phone_number)->first();
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not found with the provided phone number.'], 404);
            }

            $otp = rand(1000, 9999);
            $user->otp = $otp;
            $user->otp_expiry = now()->addMinutes(5);
            $user->save();

            // Store OTP with phone in cache/session with 5 min expiration
            // cache()->put('otp_' . $request->phone_number, $otp, now()->addMinutes(5));

            // Send OTP via Fast2SMS DLT
            // Template ID from .env (191040) - DLT approved template
            // Template message: "Your OTP is {#var#}. Valid for 5 minutes. - CRCTK"
            $templateId = env('FAST2SMS_TEMPLATE_ID'); // 191040

            // https://www.fast2sms.com/dev/bulkV2?authorization=gpSmohdctVF0Xh6zoYw6Ovi5mCufhKeXwA9BFiwWjWtkm6nRdlNXJ9JeFURv&route=dlt&sender_id=CRCTK&message=191040&variables_values=1234&flash=0&numbers=9876543210

            $success = $this->sendDltSms(
                $user->phone,           // Phone number
                $templateId,            // Template ID (191040)
                $otp                    // OTP value to replace {#var#}
            );

            if ($success) {
                return response()->json([
                    'success' => true,
                    'message' => 'OTP sent successfully',
                    // Remove 'otp' in production!
                    'otp' => $otp // For testing only
                ], 200);
            } else {
                Log::error('OTP sending failed for phone: ' . $user->phone);
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to send OTP. Please try again.',
                    // For testing, still save OTP in DB
                    'otp' => $otp // Remove in production
                ], 500);
            }
        } catch (ValidationException $e) {
            return response()->json(['success' => false, 'message' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred during login', 'error' => $e->getMessage()], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'otp' => 'required',
            'role_id' => 'required|in:1,2,3'
        ]);

        $model = $this->getModelByRoleId($request->role_id);
        if (!$model) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        $user = $model::where('phone', $request->phone_number)->first();
        if (!$user || $user->otp != $request->otp || now()->gt($user->otp_expiry)) {
            return response()->json(['error' => 'Invalid or expired OTP'], 401);
        }

        $user->otp = null; // reset OTP after verification
        $user->otp_expiry = null;
        $user->save();

        // Choose guard based on role
        $guards = ['1' => 'salesperson', '2' => 'engineer', '3' => 'deliveryman'];
        $guard = $guards[$request->role_id] ?? 'api';
        $token = auth($guard)->login($user); // if guard mapping in config/auth.php

        return response()->json(['token' => $token, 'user' => $user]);
    }


    public function logout(Request $request)
    {
        $request->validate([
            'role_id' => 'required|in:1,2,3'
        ]);

        $guards = ['1' => 'salesperson', '2' => 'engineer', '3' => 'deliveryman'];
        $guard = $guards[$request->role_id] ?? 'api';

        try {
            auth($guard)->logout();
            return response()->json(['message' => 'Successfully logged out']);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'Failed to logout'], 500);
        }
    }

    public function refreshToken(Request $request)
    {
        $request->validate([
            'role_id' => 'required|in:1,2,3'
        ]);

        $guards = ['1' => 'salesperson', '2' => 'engineer', '3' => 'deliveryman'];
        $guard = $guards[$request->role_id] ?? 'api';

        try {
            $newToken = auth($guard)->refresh();

            return response()->json([
                'access_token' => $newToken,
                'token_type' => 'bearer',
                'expires_in' => auth($guard)->factory()->getTTL() * 60
            ]);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'Failed to refresh token'], 401);
        }
    }
}

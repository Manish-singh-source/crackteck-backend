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
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{

    protected function getModelByRoleId($roleId)
    {
        return [
            1 => SalesPerson::class,
            2 => Engineer::class,
            3 => DeliveryMan::class,
        ][$roleId] ?? null;
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

            $user = $model::where('phone', $request->phone_number)->first(); // Consistency: use 'phone_number' everywhere or update to 'phone'
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not found with the provided phone number.'], 404);
            }

            $otp = rand(100000, 999999);
            $user->otp = $otp;
            $user->otp_expiry = now()->addMinutes(5);
            $user->save();

            // Send OTP to phone number using service...

            // REMOVE 'otp' from response in production!
            return response()->json(['message' => 'OTP sent successfully'], 200);
        } catch (ValidationException $e) {
            return response()->json(['success' => false, 'message' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
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

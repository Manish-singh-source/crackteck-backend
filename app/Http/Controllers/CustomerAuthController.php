<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CustomerAuthController extends Controller
{
    /**
     * Show the customer login form.
     */
    public function showLogin()
    {
        return view('frontend.auth.login');
    }

    /**
     * Handle customer login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Check if this is an AJAX request
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful!',
                    'redirect' => route('shop')
                ]);
            }

            return redirect()->intended(route('shop'));
        }

        // Check if customer exists but password is wrong
        $customer = Customer::where('email', $request->email)->first();
        
        if (!$customer) {
            $errorMessage = 'User not found. Please signup first.';
        } else {
            $errorMessage = 'Invalid login details. Please try again.';
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => $errorMessage
            ], 422);
        }

        return back()->withErrors([
            'email' => $errorMessage,
        ])->withInput($request->except('password'));
    }

    /**
     * Show the customer registration form.
     */
    public function showSignup()
    {
        return view('frontend.auth.signup');
    }

    /**
     * Handle customer registration request.
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:customers,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            return back()->withErrors($validator)->withInput();
        }

        try {
            $customer = Customer::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Registration successful! Please login to continue.',
                    'redirect' => route('customer.login')
                ]);
            }

            return redirect()->route('customer.login')->with('success', 'Registration successful! Please login to continue.');

        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'error' => $e->getMessage(),
                    'message' => 'Registration failed. Please try again.'
                ], 500);
            }

            return back()->with('error', 'Registration failed. Please try again.')->withInput();
        }
    }

    /**
     * Handle customer logout request.
     */
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Logged out successfully.',
                'redirect' => route('website')
            ]);
        }

        return redirect()->route('website');
    }

    /**
     * Get the authenticated customer data for AJAX requests.
     */
    public function getAuthenticatedCustomer(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            $customer = Auth::guard('customer')->user();
            return response()->json([
                'authenticated' => true,
                'customer' => [
                    'id' => $customer->id,
                    'email' => $customer->email,
                    'full_name' => $customer->full_name,
                    'first_name' => $customer->first_name,
                    'last_name' => $customer->last_name,
                ]
            ]);
        }

        return response()->json([
            'authenticated' => false
        ]);
    }
}

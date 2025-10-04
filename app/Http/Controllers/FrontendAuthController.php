<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class FrontendAuthController extends Controller
{
    //
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create corresponding customer record for e-commerce customer
        $this->createEcommerceCustomer($user, $request);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect()->back()->with('success', 'Registration successful.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('/');
    }

    /**
     * Show e-commerce login form.
     */
    public function showEcommerceLogin()
    {
        return view('frontend.auth.login');
    }

    /**
     * Show e-commerce signup form.
     */
    public function showEcommerceSignup()
    {
        return view('frontend.auth.signup');
    }

    /**
     * Handle e-commerce login.
     */
    public function ecommerceLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if this is an AJAX request
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful.',
                    'redirect' => $request->input('redirect_url', route('shop'))
                ]);
            }

            return redirect()->intended(route('shop'));
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'The provided credentials do not match our records.',
                'errors' => ['email' => ['The provided credentials do not match our records.']]
            ], 422);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    /**
     * Handle e-commerce signup.
     */
    public function ecommerceSignup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create corresponding customer record for e-commerce customer
        $this->createEcommerceCustomer($user, $request);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Check if this is an AJAX request
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Registration successful.',
                    'redirect' => $request->input('redirect_url', route('shop'))
                ]);
            }

            return redirect()->intended(route('shop'));
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again.'
            ], 500);
        }

        return redirect()->back()->with('success', 'Registration successful.');
    }

    /**
     * Create a customer record for e-commerce user registration.
     */
    private function createEcommerceCustomer(User $user, Request $request)
    {
        // Split name into first and last name
        $nameParts = explode(' ', $user->name, 2);
        $firstName = $nameParts[0];
        $lastName = isset($nameParts[1]) ? $nameParts[1] : '';

        Customer::create([
            'user_id' => $user->id,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $user->email,
            'customer_type' => 'E-commerce Customer',
            'status' => 'active',
            // All other fields will be nullable and filled later when user updates profile or places order
        ]);
    }
}

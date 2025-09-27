<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if customer is authenticated using the customer guard
        if (!Auth::guard('customer')->check()) {
            // If it's an AJAX request, return JSON response
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login to use this feature.',
                    'redirect' => route('customer.login')
                ], 401);
            }

            // For regular requests, redirect to login with intended URL
            return redirect()->route('customer.login')
                           ->with('error', 'Please login to access this page.')
                           ->with('intended', $request->url());
        }

        return $next($request);
    }
}

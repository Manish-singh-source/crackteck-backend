<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\SDUIController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\FollowUpController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public API routes (no authentication required)
Route::prefix('auth')->group(function () {
    // Route::post('/login', [ApiAuthController::class, 'login']);
});

// Order-related API routes (public for now, can be protected later)
Route::get('/search-product', [OrderController::class, 'searchProducts']);
Route::get('/search-customer', [OrderController::class, 'searchCustomers']);

// Protected API routes (authentication required)
Route::middleware('auth:sanctum')->group(function () {
    // Authentication routes
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [ApiAuthController::class, 'logout']);
        Route::get('/user', [ApiAuthController::class, 'user']);
    });

    // Example protected routes with role-based access
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/users', function () {
            return response()->json(['message' => 'Admin only endpoint']);
        });
    });

    Route::middleware('role:user,admin')->group(function () {
        Route::get('/user/profile', function () {
            return response()->json(['message' => 'User or Admin endpoint']);
        });
    });
});

/*
|--------------------------------------------------------------------------
| SDUI API Routes for Flutter App
|--------------------------------------------------------------------------
|
| These routes provide Server-Driven UI configuration for the Flutter app.
| They can be accessed with or without authentication based on settings.
|
*/


// SDUI Public Routes (can be protected via settings)
Route::prefix('ui')->group(function () {
    Route::get('/role-selection', [SDUIController::class, 'handleRoleSelectionSchema']);
    // Route::get('/login', [SDUIController::class, 'handleLoginSchema']);
    // Get SDUI configuration for a specific screen/role (returns complete JSON schema)
    Route::get('/config', [SDUIController::class, 'getConfig']);

    // Get all available screens for a role
    Route::get('/screens', [SDUIController::class, 'getScreens']);

    // Get component types and schemas (reference documentation)
    Route::get('/component-types', [SDUIController::class, 'getComponentTypes']);
});

// SDUI Protected Routes (admin only)
Route::prefix('ui')->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    // Clear SDUI cache
    Route::post('/clear-cache', [SDUIController::class, 'clearCache']);
});

Route::post('/send-otp', [ApiAuthController::class, 'login']);
Route::post('/verify-otp', [ApiAuthController::class, 'verifyOtp']);

Route::middleware(['jwt.verify'])->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::post('/refresh-token', [ApiAuthController::class, 'refreshToken']);

    Route::controller(LeadController::class)->group(function () {
        Route::get('/leads', 'index');
        Route::post('/leads', 'store');
        Route::get('/leads/{id}', 'show');
        Route::put('/leads/{id}', 'update');
        Route::delete('/leads/{id}', 'destroy');
    });

    Route::controller(FollowUpController::class)->group(function () {
        Route::get('/follow-up', 'index');
        Route::post('/follow-up', 'store');
        Route::get('/follow-up/{id}', 'show');
        Route::put('/follow-up/{id}', 'update');
        Route::delete('/follow-up/{id}', 'destroy');
    });
});

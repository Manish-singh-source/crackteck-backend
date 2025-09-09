<?php

use App\Http\Controllers\Api\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::post('/login', [ApiAuthController::class, 'login']);
});

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

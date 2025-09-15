<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    
    // Example protected by role
    Route::middleware('role:admin')->get('/admin/data', function () {
        return response()->json(['message' => 'Admin only data']);
    });

});
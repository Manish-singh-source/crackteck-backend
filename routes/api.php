<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\MeetController;
use App\Http\Controllers\Api\SDUIController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\FollowUpController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\QuotationController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\OrderController;

// use App\Http\Controllers\AMCRequestController;
// use App\Http\Controllers\AMCRequestController;

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

// // Public API routes (no authentication required)
// Route::prefix('auth')->group(function () {
//     // Route::post('/login', [ApiAuthController::class, 'login']);
// });

// // Order-related API routes (public for now, can be protected later)
// Route::get('/search-product', [OrderController::class, 'searchProducts']);
// Route::get('/search-customer', [OrderController::class, 'searchCustomers']);

// // Protected API routes (authentication required)
// Route::middleware('auth:sanctum')->group(function () {
//     // Authentication routes
//     Route::prefix('auth')->group(function () {
//         Route::post('/logout', [ApiAuthController::class, 'logout']);
//         Route::get('/user', [ApiAuthController::class, 'user']);
//     });

//     // Example protected routes with role-based access
//     Route::middleware('role:admin')->group(function () {
//         Route::get('/admin/users', function () {
//             return response()->json(['message' => 'Admin only endpoint']);
//         });
//     });

//     Route::middleware('role:user,admin')->group(function () {
//         Route::get('/user/profile', function () {
//             return response()->json(['message' => 'User or Admin endpoint']);
//         });

//         // AMC Request Routes (Commented out - using FrontendController instead)
//         // Route::prefix('crm')->group(function () {
//         //     Route::post('/create-amc-request', [AMCRequestController::class, 'store']);
//         //     Route::get('/amc-plans', [AMCRequestController::class, 'getAmcPlans']);
//         // });
//     });
// });

// /*
// |--------------------------------------------------------------------------
// | SDUI API Routes for Flutter App
// |--------------------------------------------------------------------------
// |
// | These routes provide Server-Driven UI configuration for the Flutter app.
// | They can be accessed with or without authentication based on settings.
// |
// */


// // SDUI Public Routes (can be protected via settings)
// Route::prefix('ui')->group(function () {
//     Route::get('/role-selection', [SDUIController::class, 'handleRoleSelectionSchema']);
//     // Route::get('/login', [SDUIController::class, 'handleLoginSchema']);
//     // Get SDUI configuration for a specific screen/role (returns complete JSON schema)
//     Route::get('/config', [SDUIController::class, 'getConfig']);

//     // Get all available screens for a role
//     Route::get('/screens', [SDUIController::class, 'getScreens']);

//     // Get component types and schemas (reference documentation)
//     Route::get('/component-types', [SDUIController::class, 'getComponentTypes']);
// });

// // SDUI Protected Routes (admin only)
// Route::prefix('ui')->middleware(['auth:sanctum', 'role:admin'])->group(function () {
//     // Clear SDUI cache
//     Route::post('/clear-cache', [SDUIController::class, 'clearCache']);
// });














Route::post('/signup', [ApiAuthController::class, 'signup']);
Route::post('/send-otp', [ApiAuthController::class, 'login']);
Route::post('/verify-otp', [ApiAuthController::class, 'verifyOtp']);

Route::middleware(['jwt.verify'])->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::post('/refresh-token', [ApiAuthController::class, 'refreshToken']);

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::get('/sales-overview', 'salesOverview');
    });
    
    Route::controller(TaskController::class)->group(function () {
        Route::get('/task', 'index');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/product', 'listProducts');
        Route::get('/product/{id}', 'product');
        Route::get('/all-product', 'allListProducts');
        Route::get('/all-product/{id}', 'allProduct');
    });

    Route::controller(LeadController::class)->group(function () {
        Route::get('/leads', 'index');
        Route::post('/lead', 'store');
        Route::get('/lead/{id}', 'show');
        Route::put('/lead/{id}', 'update');
        Route::delete('/lead/{id}', 'destroy');
    });

    Route::controller(FollowUpController::class)->group(function () {
        Route::get('/follow-up', 'index');
        Route::post('/follow-up', 'store');
        Route::get('/follow-up/{id}', 'show');
        Route::put('/follow-up/{id}', 'update');
        Route::delete('/follow-up/{id}', 'destroy');
    });

    Route::controller(MeetController::class)->group(function () {
        Route::get('/meets', 'index');
        Route::post('/meet', 'store');
        Route::get('/meet/{id}', 'show');
        Route::put('/meet/{id}', 'update');
        Route::delete('/meet/{id}', 'destroy');
    });

    Route::controller(QuotationController::class)->group(function () {
        Route::get('/quotation', 'index');
        Route::post('/quotation', 'store');
        Route::get('/quotation/{id}', 'show');
        Route::put('/quotation/{id}', 'update');
        Route::delete('/quotation/{id}', 'destroy');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index');
        Route::put('/profile', 'update');
    });

    Route::controller(AttendanceController::class)->group(function () {
        Route::get('/attendance', 'index');
        Route::post('/attendance', 'store');
    });

});

<?php

use App\Http\Controllers\FrontendAuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontendEcommerceController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;

// Login routes
// Route::get('/register', [FrontendAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [FrontendAuthController::class, 'register'])->name('frontend.register');

// Route::get('/login', [FrontendAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [FrontendAuthController::class, 'login'])->name('frontend.login');

Route::post('/frontend-logout', [FrontendAuthController::class, 'logout'])->name('frontend.logout');

// E-commerce Authentication Routes
Route::get('/e-commerce/login', [FrontendAuthController::class, 'showEcommerceLogin'])->name('ecommerce.login');
Route::get('/e-commerce/signup', [FrontendAuthController::class, 'showEcommerceSignup'])->name('ecommerce.signup');
Route::post('/e-commerce/login', [FrontendAuthController::class, 'ecommerceLogin'])->name('ecommerce.login.post');
Route::post('/e-commerce/signup', [FrontendAuthController::class, 'ecommerceSignup'])->name('ecommerce.signup.post');



// Home
Route::get('/', [FrontendController::class, 'index'])->name('website');

// Shop
// Route::get('/shop', function () {
//     return view('frontend/shop');
// })->name('shop');

// E-commerce Routes
Route::get('/e-commerce/shop', [FrontendEcommerceController::class, 'shop'])->name('shop');
Route::get('/e-commerce/product/{id}', [FrontendEcommerceController::class, 'productDetail'])->name('ecommerce.product.detail');
Route::get('/product-detail/{id}', [FrontendEcommerceController::class, 'productDetail'])->name('product.detail');

// About US
Route::get('/about-us', function () {
    return view('frontend/about');
})->name('about');

// Contact US
Route::get('/contact-us', function () {
    return view('frontend/contact');
})->name('contact');

// AMC
Route::get('/amc', function () {
    return view('frontend/amc');
})->name('amc');

// AMC Detail
Route::get('/amc-detail', function () {
    return view('frontend/amc-details');
})->name('amc-details');

// Wishlist Routes
Route::controller(WishlistController::class)->group(function () {
    // Display wishlist page (requires authentication)
    Route::get('/wishlist', 'index')->name('wishlist')->middleware('auth');

    // AJAX routes for wishlist operations (require authentication)
    Route::middleware('auth')->group(function () {
        Route::post('/wishlist/add', 'store')->name('wishlist.add');
        Route::delete('/wishlist/{id}', 'destroy')->name('wishlist.remove');
        Route::post('/wishlist/{id}/move-to-cart', 'moveToCart')->name('wishlist.move-to-cart');
    });

    // Wishlist count (can be accessed without auth, returns 0 for guests)
    Route::get('/wishlist/count', 'getWishlistCount')->name('wishlist.count');
});

// Cart Routes
Route::controller(CartController::class)->group(function () {
    // Display cart page (requires authentication)
    Route::get('/shop-cart', 'index')->name('shop-cart')->middleware('auth');

    // AJAX routes for cart operations (require authentication)
    Route::middleware('auth')->group(function () {
        Route::post('/cart/add', 'store')->name('cart.add');
        Route::put('/cart/update/{id}', 'update')->name('cart.update');
        Route::delete('/cart/remove/{id}', 'destroy')->name('cart.remove');
        Route::get('/cart/data', 'getCartData')->name('cart.data');
        Route::post('/cart/check-status', 'checkCartStatus')->name('cart.check-status');
    });

    // Cart count (can be accessed without auth, returns 0 for guests)
    Route::get('/cart/count', 'getCartCount')->name('cart.count');
});

// Compare
Route::get('/compare', function () {
    return view('frontend/compare');
})->name('compare');

// Terms & Conditions
Route::get('/t&c', function () {
    return view('frontend/t&c');
})->name('t&c');

// Shipping Information
Route::get('/shipping-info', function () {
    return view('frontend/shipping-info');
})->name('shipping-info');

// Return & Refund Policy
Route::get('/return-refund-policy', function () {
    return view('frontend/return-refund-policy');
})->name('return-refund-policy');

// Privacy Policy
Route::get('/privacy', function () {
    return view('frontend/privacy');
})->name('privacy');

// FAQ
Route::get('/faq', function () {
    return view('frontend/faq');
})->name('faq');

// Checkout Routes
Route::controller(CheckoutController::class)->group(function () {
    // Display checkout page (requires authentication)
    Route::get('/checkout', 'index')->name('checkout')->middleware('auth');

    // AJAX routes for checkout operations (require authentication)
    Route::middleware('auth')->group(function () {
        Route::post('/checkout/place-order', 'store')->name('checkout.store');
        Route::get('/checkout/addresses', 'getUserAddresses')->name('checkout.addresses');
        Route::post('/checkout/save-address', 'saveAddress')->name('checkout.save-address');
    });
});

// Product Detail
Route::get('/product-detail', function () {
    return view('frontend/product-detail');
})->name('product-detail');

// Track Your Order
Route::get('/track-your-order', function () {
    return view('frontend/track-your-order');
})->name('track-your-order');

// My Account order
Route::get('/my-account-orders', function () {
    return view('frontend/my-account-orders');
})->name('my-account-orders');

// My Account Address
Route::get('/my-account-address', function () {
    return view('frontend/my-account-address');
})->name('my-account-address');

// My Account Edit
Route::get('/my-account-edit', function () {
    return view('frontend/my-account-edit');
})->name('my-account-edit');

// My Account AMC
Route::get('/my-account-amc', function () {
    return view('frontend/my-account-amc');
})->name('my-account-amc');

// My Account
Route::get('/my-account', function () {
    return view('frontend/my-account');
})->name('my-account');

// 404
// Route::get('/404', function () {
//     return view('frontend/404');
// })->name('404');

// Order Details
Route::get('/order-details', function () {
    return view('frontend/order-details');
})->name('order-details');

Route::fallback( function () {
    return view('frontend/404');
});


Route::controller(SubscriberController::class)->group(function (){
    Route::post('/newsletter/subscribe', 'subscribe')->name('newsletter.subscribe');
});
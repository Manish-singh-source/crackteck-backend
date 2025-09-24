<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/website', [FrontendController::class, 'index'])->name('website');

// Shop
Route::get('/shop', function () {
    return view('frontend/shop');
})->name('shop');

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

// Wishlist
Route::get('/wishlist', function () {
    return view('frontend/wishlist');
})->name('wishlist');

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

// Shop Cart
Route::get('/shop-cart', function () {
    return view('frontend/shop-cart');
})->name('shop-cart');

// Checkout
Route::get('/checkout', function () {
    return view('frontend/checkout');
})->name('checkout');

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
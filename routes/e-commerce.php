<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductDealController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ProductVariantsController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

// *******************************************************************************************************************************************************
// *******************************************************************************************************************************************************
// **************************************************************      E-Commerce      *******************************************************************
// *******************************************************************************************************************************************************
// *******************************************************************************************************************************************************

// Index Page 
Route::get('/e-commerce/index', function () {
    return view('/e-commerce/index');
})->name('e-commerce/index');

// ------------------------------------------------------------ E-Commerce Customer Page -------------------------------------------------------------

Route::controller(CustomerController::class)->group(function (){
    // E-commerce Customer Page 
    Route::get('/e-commerce/customers' ,'ec_index')->name('ec.customer.index');
    // Create EC Customer Page
    Route::get('/e-commerce/create-customer' ,'ec_create')->name('ec.customer.create');
    // Store EC Customer Detail
    Route::post('/e-commerce/store-customer', 'ec_store')->name('ec.customer.store');
    // View EC Customer Page
    Route::get('/e-commerce/view-customer/{id}' ,'ec_view')->name('ec.customer.view');
    // Edit EC Customer Page
    Route::get('/e-commerce/edit-customer/{id}' ,'ec_edit')->name('ec.customer.edit');
    // Update EC Customer Page 
    Route::put('/e-commerce/update-customer/{id}', 'ec_update')->name('ec.customer.update');
    // Delete EC Customer Page 
    Route::delete('/e-commerce/delete-customer/{id}', 'ec_delete')->name('ec.customer.delete');
});

// ------------------------------------------------------------ E-Commerce Order Page -------------------------------------------------------------

Route::controller(OrderController::class)->group(function (){
    // Order Page 
    Route::get('/e-commerce/order' ,'index')->name('order.index');
    // Create Order Page
    Route::get('/e-commerce/create-order' ,'create')->name('order.create');
    // View Order Page
    Route::get('/e-commerce/view-order' ,'view')->name('order.view');
});

// ------------------------------------------------------------ E-Commerce Products Page -------------------------------------------------------------

Route::controller(ProductListController::class)->group(function (){
    // Product Page 
    Route::get('/e-commerce/products' ,'ec_index')->name('ec.product.index');
    // Create Product Page
    Route::get('/e-commerce/create-product' ,'ec_create')->name('ec.product.create');
    // View Product Page
    Route::get('/e-commerce/view-product' ,'ec_view')->name('ec.product.view');
    // Edit Product Page 
    Route::get('/e-commerce/edit-product' ,'ec_edit')->name('ec.product.edit');
    // Scrap Items Product Page
    Route::get('/e-commerce/scrap-items' ,'ec_scrapItems')->name('scrap-items');
});

// ------------------------------------------------------------ E-Commerce Categories Page -------------------------------------------------------------

Route::controller(CategorieController::class)->group(function (){
    // Categorie Page 
    Route::get('/e-commerce/categories' ,'index')->name('category.index');
    // Create Categorie Page
    Route::get('/e-commerce/create-categorie' ,'create')->name('category.create');
    // Store Categorie Page 
    // Route::post('/e-commerce/store-categorie' ,'store')->name('category.store');
    // Parent Categorie Store 
    Route::post('/e-commerce/store-parent-categorie' ,'storeParent')->name('parent.category.store');
    // Sub Categorie Store 
    Route::post('/e-commerce/store-sub-categorie' ,'storeSubCategorie')->name('sub.category.store');
    // View Sub Categorie From Parent View 
    Route::get('/e-commerce/view-categorie/{id}' ,'parentCategorie')->name('categorie.view');
    // Edit Create Categorie Page 
    Route::get('/e-commerce/edit-categorie/{id}' ,'edit')->name('category.edit');
    // Update Categorie Page 
    Route::put('/e-commerce/update-categorie/{id}' , 'update')->name('category.update');
    // Delete Categorie Page 
    Route::delete('/e-commerce/delete-categorie/{id}' ,'delete')->name('category.delete');
});

Route::get('/categorie-dependent', [CategorieController::class, 'getDependentData']);

// ------------------------------------------------------------ E-Commerce Brands Page -------------------------------------------------------------

Route::controller(BrandController::class)->group(function (){
    // Brands Page 
    Route::get('/e-commerce/brands' ,'index')->name('brand.index');
    // Create Brands Page 
    Route::get('/e-commerce/create-brand' ,'create')->name('brand.create');
    // Store Brands Page 
    Route::post('/e-commerce/store-brand' ,'store')->name('brand.store');
    // Edit Brands Page
    Route::get('/e-commerce/edit-brand/{id}' ,'edit')->name('brand.edit');
    // Update Brands Page 
    Route::put('/e-commerce/update-brand/{id}', 'update')->name('brand.update');
    // Delete Brands Page 
    Route::delete('/e-commerce/delete-brand/{id}' ,'delete')->name('brand.delete');
});

// ------------------------------------------------------------ E-Commerce Product Variants Page -------------------------------------------------------------

Route::controller(ProductVariantsController::class)->group(function (){
    // Product Variants Page 
    Route::get('/e-commerce/product-variants' ,'index')->name('variant.index');
    // Product Attribute List Page
    Route::get('/e-commerce/product-attribute-list/{id}' ,'view')->name('variant.view');
    // Update Product Attribute List 
    Route::put('/e-commerce/update-product-attribute/{id}' ,'updateAttribute')->name('variant.update');
    // Store Product Attribute 
    Route::post('/e-commerce/store-product-attribute' ,'storeAttribute')->name('variant.store');
    // Delete Product Attribute
    Route::delete('/e-commerce/delete-product-attribute/{id}' ,'deleteAttribute')->name('variant.delete');
    // Store Product Attribute Value 
    Route::post('/e-commerce/store-product-attribute-value' ,'storeAttributeValue')->name('variant.store.attribute.value');
    
});

// ------------------------------------------------------------ E-Commerce Coupons Page -------------------------------------------------------------

Route::controller(CouponsController::class)->group(function (){
    // Coupons Page 
    Route::get('/e-commerce/coupons' ,'index')->name('coupon.index');
    // Create Coupons Page
    Route::get('/e-commerce/create-coupons' ,'create')->name('coupon.create');
    // Edit Coupons Page
    Route::get('/e-commerce/edit-coupons' ,'edit')->name('coupon.edit');
});

// ------------------------------------------------------------ E-Commerce Subscribers Page -------------------------------------------------------------

Route::controller(SubscriberController::class)->group(function (){
    // Subscribers Page
    Route::get('/e-commerce/subscribers' ,'index')->name('subscriber.index');
    // Send Mail Page
    Route::get('/e-commerce/send-mail-subscriber' , 'sendMail')->name('subscriber.send-mail');
});

// ------------------------------------------------------------ E-Commerce Contact Page -------------------------------------------------------------

// Contact Page 
Route::get('/e-commerce/contacts', [ContactController::class, 'index'])->name('contact.index');

// ---------------------------------------- E-Commerce Website Banner Page and Promotional Banner Page ------------------------------------------------

Route::controller(BannerController::class)->group(function (){
    // Website Banner Page
    Route::get('/e-commerce/website-banner' ,'websiteBanner')->name('website.banner.index');
    // Add Website Banner Page
    Route::get('/e-commerce/add-banner' ,'addWebsiteBanner')->name('website.banner.create');
    // Store Website Banner Page 
    Route::post('/e-commerce/store-banner', 'storeWebsiteBanner')->name('website.banner.store');
    // Edit Website Banner Page
    Route::get('/e-commerce/edit-banner/{id}' ,'editWebsiteBanner')->name('website.banner.edit');
    // Update website Banner Page 
    Route::put('/e-commerce/update-banner/{id}' ,'updateWebsiteBanner')->name('website.banner.update');
    // Delete Website Banner Page 
    Route::delete('/e-commerce/delete-banner/{id}', 'deleteWebsiteBanner')->name('website.banner.delete');

    // Promotional Banner Page
    Route::get('/e-commerce/promotional-banner' ,'promotionalBanner')->name('promotional.banner.index');
    // Add Promotional Banner Page
    Route::get('/e-commerce/add-promotional-banner' ,'addPromotionalBanner')->name('promotional.banner.create');
    // Store Promotional Banner Page 
    Route::post('/e-commerce/store-promotional-banner' ,'storePromotionalBanner')->name('promotional.banner.store');
    // Edit Promotional Banner Page
    Route::get('/e-commerce/edit-promotional-banner/{id}' ,'editPromotionalBanner')->name('promotional.banner.edit');
    // Update Promotional Banner Page 
    Route::put('/e-commerce/update-promotional-banner/{id}' ,'updatePromotionalBanner')->name('promotional.banner.update');
    // Delete Promotional Banner Page 
    Route::delete('/e-commerce/delete-promotional-banner{id}' ,'deletePromotionalBanner')->name('promotional.banner.delete');
});

// ------------------------------------------------------------ E-Commerce Product Deals Page -------------------------------------------------------------

Route::controller(ProductDealController::class)->group(function (){
    // Product Deals Page
    Route::get('/e-commerce/product-deals' ,'index')->name('product-deals.index');
    // Add Product Deals Page
    Route::get('/e-commerce/add-product-deals' ,'create')->name('product-deals.create');
    // Edit Product Deals Page
    Route::get('/e-commerce/edit-product-deals' ,'edit')->name('product-deals.edit');
});

// ------------------------------------------------------------ E-Commerce Collection Page -------------------------------------------------------------

Route::controller(CollectionController::class)->group(function (){
    // Collection Deals Page 
    Route::get('/e-commerce/collections' ,'index')->name('collection.index');
    // Add Collection Deals Page
    Route::get('e-commerce/add-collections' ,'create')->name('collection.create');
    // Edit Collection Deals Page
    Route::get('/e-commerce/edit-collections' ,'edit')->name('collection.edit');
});
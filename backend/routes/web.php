<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AmcController;
use App\Http\Controllers\AssignedJobController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CallLogController;
use App\Http\Controllers\CaseTransferController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientReceiptController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\CreditorsReportController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Delivery;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\FieldIssuesController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\InHandProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\KycLogController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LowStockController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayToVendorController;
use App\Http\Controllers\PickupRequestController;
use App\Http\Controllers\PincodeController;
use App\Http\Controllers\ProductDealController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ProductVariantsController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\ReimbursementController;
use App\Http\Controllers\SaleReportController;
use App\Http\Controllers\SalesInvoicingController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\StockReportController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\TrackProductController;
use App\Http\Controllers\TrackRequestController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VendorPurchaseBillController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WarehouseRackController;
use App\Http\Controllers\WithdrawController;
use App\Models\PickupRequest;

// Login Page 
Route::get('/', function () {
    return view('login');
})->name('login');

// Sign Up  
Route::get('/signup', function () {
    return view('signup');
})->name('signup');

// Recover Password  
Route::get('/recover-password', function () {
    return view('recover-password');
})->name('recover-password');

// 404 
Route::get('/404', function () {
    return view('404');
})->name('404');

// 500 
Route::get('/500', function () {
    return view('500');
})->name('500');

// 503 
Route::get('/503', function () {
    return view('503');
})->name('503');

// Index
// Create 
// Store 
// Delete 
// Edit
// Update 
// View 


// *******************************************************************************************************************************************************
// *******************************************************************************************************************************************************
// ********************************************************************      CRM       *******************************************************************
// *******************************************************************************************************************************************************
// *******************************************************************************************************************************************************



// Index Page 
Route::get('/crm/index', function () {
    return view('/crm/index');
})->name('crm/index');

// ------------------------------------------------------------ Access Control ( Staff Page) -------------------------------------------------------------

// Staff List 
Route::get('/crm/staff', function () {
    return view('/crm/access-control/staff/index');
})->name('staff.index');

// Staff Create 
Route::get('/crm/create-staff', function () {
    return view('/crm/access-control/staff/create');
})->name('staff.create');

// Staff View 
Route::get('/crm/view-staff', function () {
    return view('/crm/access-control/staff/view');
})->name('staff.view');

// Staff Edit
Route::get('/crm/edit-staff', function () {
    return view('/crm/access-control/staff/edit');
})->name('staff.edit');

// ------------------------------------------------------------ Access Control ( Roles Page) -------------------------------------------------------------

// Role List
Route::get('/crm/roles', function () {
    return view('/crm/access-control/roles/index');
})->name('roles.index');

// Role Create
Route::get('/crm/create-roles', function () {
    return view('/crm/access-control/roles/create');
})->name('roles.create');

// Role Edit
Route::get('/crm/edit-roles', function () {
    return view('/crm/access-control/roles/edit');
})->name('roles.edit');

// ------------------------------------------------------------ Accounts Page -------------------------------------------------------------

// Transactions Page
Route::get('/crm/transactions', [TransactionController::class, 'index'])->name('transactions');
// Route::get('/crm/transactions', function () {
//     return view('/crm/accounts/transactions');
// })->name('transactions');

// Payment Page 
Route::get('/crm/payments', [PaymentController::class, 'index'])->name('payments');
// Route::get('/crm/payments', function () {
//     return view('/crm/accounts/payments');
// })->name('payments');

// Reimbursement Page
Route::get('/crm/reimbursement', [ReimbursementController::class, 'index'])->name('reimbursement');
// Route::get('/crm/reimbursement', function () {
//     return view('/crm/accounts/reimbursement');
// })->name('reimbursement');

// Withdraw Page
Route::get('/crm/withdraw', [WithdrawController::class, 'index'])->name('withdraw');
// Route::get('/crm/withdraw', function () {
//     return view('/crm/accounts/withdraw');
// })->name('withdraw');

// KYC Log Page
Route::get('/crm/kyc-log', [KycLogController::class, 'index'])->name('kyc-log');
// Route::get('/crm/kyc-log', function () {
//     return view('/crm/accounts/kyc-log');
// })->name('kyc-log');

// ######################## Sales Invoicing  ########################

Route::controller(SalesInvoicingController::class)->group(function (){
    //  Sales Invoicing List Page
    Route::get('/crm/sales-invoicing', 'index')->name('sales.index');
    // Create Sales Invoicing List Page 
    Route::get('/crm/create-sales-invoicing','create')->name('sales.create');
    // View Sales Invoicing List Page 
    Route::get('/crm/view-sales-invoicing','view')->name('sales.view');
});
//  Sales Invoicing List Page
// Route::get('/crm/sales-invoicing', function () {
//     return view('/crm/accounts/sales-invoicing/index');
// })->name('sales.index');

// Sales Invoicing Create Page
// Route::get('/crm/create-sales-invoicing', function () {
//     return view('/crm/accounts/sales-invoicing/create');
// })->name('sales.create');

// Sales Invoicing View Page
// Route::get('/crm/view-sales-invoicing', function () {
//     return view('/crm/accounts/sales-invoicing/view');
// })->name('sales.view');

// ######################## Client Receipts  ########################

Route::controller(ClientReceiptController::class)->group(function (){
    // Client Receipts List Page
    Route::get('/crm/client-receipts','index')->name('client.index');
    // Create Client Recipot Page 
    Route::get('/crm/create-client-receipts','create')->name('client.create');
    // View Client Receipt Page 
    Route::get('/crm/view-client-receipts','view')->name('client.view');
    // Edit Client Receipt Page 
    Route::get('/crm/edit-client-receipts','edit')->name('client.edit');
});
// Client Receipts List Page
// Route::get('/crm/client-receipts', function () {
//     return view('/crm/accounts/client-receipts/index');
// })->name('client.index');

// Client Receipts Create Page
// Route::get('/crm/create-client-receipts', function () {
//     return view('/crm/accounts/client-receipts/create');
// })->name('client.create');

// Client Receipts View Page
// Route::get('/crm/view-client-receipts', function () {
//     return view('/crm/accounts/client-receipts/view');
// })->name('client.view');

// Client Receipts Edit Page
// Route::get('/crm/edit-client-receipts', function () {
//     return view('/crm/accounts/client-receipts/edit');
// })->name('client.edit');

// ######################## Payments to Vendors  ########################

Route::controller(PayToVendorController::class)->group(function(){
    // Payments to Vendors List Page
    Route::get('/crm/payments-to-vendor','index')->name('pay-to-vendors.index');
    // Create Payments to Vendors List Page 
    Route::get('/crm/create-payments-to-vendor','create')->name('pay-to-vendors.create');
});
// Route::get('/crm/payments-to-vendors', function () {
//     return view('/crm/accounts/payments-to-vendors/index');
// })->name('pay-to-vendors.index');

// Payments to Vendors Create Page
// Route::get('/crm/create-payments-to-vendors', function () {
//     return view('/crm/accounts/payments-to-vendors/create');
// })->name('pay-to-vendors.create');

// ######################## Creditors Report  ########################

Route::controller(CreditorsReportController::class)->group(function(){
    // Creditors Report List Page
    Route::get('/crm/creditors-report', 'index')->name('creditors-report.index');
});
// Creditors Report List Page
// Route::get('/crm/creditors-report', function () {
//     return view('/crm/accounts/creditors-report/index');
// })->name('creditors-report.index');

// ######################## Expenses  ########################

Route::controller(ExpensesController::class)->group(function (){
    // Expenses List Page
    Route::get('/crm/expenses', 'index')->name('expenses.index');
    // Expenses Create Page 
    Route::get('/crm/create-expenses', 'create')->name('expenses.create');
});
// Expenses List Page
// Route::get('/crm/expenses', function () {
//     return view('crm/accounts/expenses/index');
// })->name('expenses.index');

// Expenses Create Page
// Route::get('/crm/create-expenses', function () {
//     return view('crm/accounts/expenses/create');
// })->name('expenses.create');

// ######################## Stock Request  ########################

Route::controller(StockReportController::class)->group(function (){
    // Stock Request Page
    Route::get('/crm/stock-report','index')->name('stock-report.index');
    // Stock Request Create Page 
    Route::get('/crm/create-stock-report','create')->name('stock-report.create');
    // Stock Request Edit Page 
    Route::get('/crm/edit-stock-report','edit')->name('stock-report.edit');
});
// Stock Request Page
// Route::get('/crm/stock-request', function () {
//     return view('/crm/accounts/stock-request/index');
// })->name('stock-request.index');

// Stock Request Create Page
// Route::get('/crm/create-stock-request', function () {
//     return view('/crm/accounts/stock-request/create');
// })->name('stock-request.create');

// Stock Request Edit Page
// Route::get('/crm/edit-stock-request', function () {
//     return view('/crm/accounts/stock-request/edit');
// })->name('stock-request.edit');

// ######################## Low Stock Alert  ########################

Route::controller(LowStockController::class)->group(function (){
    // Low Stock Alert Page
    Route::get('/crm/low-stock-alert', 'index')->name('low-stock-alert');
});
// Low Stock Alert Page
// Route::get('/crm/low-stock-alert', function () {
//     return view('/crm/accounts/low-stock-alert');
// })->name('low-stock-alert');

// ------------------------------------------------------------ Customer Page -------------------------------------------------------------



// Create Customer Page
// Route::get('/crm/create-customer', function (){     
//     return view('/crm/customer/create');
// })->name('customer.create');

// Index
// Create 
// Store 
// Delete 
// Edit
// Update 
// View 

Route::controller(CustomerController::class)->group(function () {
    // Customers Page
    Route::get('/crm/customers', 'index')->name('customer.index');
    // Create Customer Page
    Route::get('/crm/create-customer', 'create')->name('customer.create');
    // Store Customer Detail
    Route::post('/crm/store-customer', 'store')->name('customer.store');
    // View Customer Page
    Route::get('/crm/view-customer/{id}', 'view')->name('customer.view');
    // Edit Customer Page
    Route::get('/crm/edit-customer/{id}', 'edit')->name('customer.edit');
    // Update Customer Page 
    Route::put('/crm/update-customer/{id}', 'update')->name('customer.update');
    // Delete Customer Page 
    Route::delete('/crm/delete-customer/{id}', 'delete')->name('customer.delete');
});

// ------------------------------------------------------------ Engineers Page -------------------------------------------------------------

Route::controller(EngineerController::class)->group(function () {
    // Engineers Page 
    Route::get('/crm/engineers', 'index')->name('engineers.index');
    // Create Engineer Page 
    Route::get('/crm/create-engineers', 'create')->name('engineer.create');
    // Store Engineer Page 
    Route::post('/crm/store-engineers', 'store')->name('engineer.store');
    // View Engineer Page
    Route::get('/crm/view-engineer/{id}', 'view')->name('engineer.view');
    // Edit Engineer Page
    Route::get('/crm/edit-engineer/{id}', 'edit')->name('engineer.edit');
    // Update Engineer Page
    Route::put('/crm/update-engineer/{id}', 'update')->name('engineer.update');
    // Delete Engineer Page 
    Route::delete('/crm/delete-engineer/{id}', 'delete')->name('engineer.delete');
});


// Create Engineer Page
// Route::get('/crm/create-engineer', function () {
//     return view('/crm/engineers/create');
// })->name('engineers.create');

// View Engineer Page
// Route::get('/crm/view-engineer', function () {
//     return view('/crm/engineers/view');
// })->name('engineers.view');

// Edit Engineer Page
// Route::get('/crm/edit-engineer', function () {
//     return view('/crm/engineers/edit');
// })->name('engineers.edit');

// Task Engineer Page
Route::get('/crm/engineer-tasks', function () {
    return view('/crm/engineers/task');
})->name('engineers.task');

// ------------------------------------------------------------ Delivery Man Page -------------------------------------------------------------

Route::controller(Delivery::class)->group(function () {
    // Delivery Man Page 
    Route::get('/crm/delivery-man', 'index')->name('delivery-man.index');
    // Create Delivery Man Page 
    Route::get('/crm/create-delivery-man', 'create')->name('delivery-man.create');
    // Store Delivery Man Page 
    Route::post('/crm/store-delivery-man', 'store')->name('delivery-man.store');
    // View Delivery Man Page
    Route::get('/crm/view-delivery-man/{id}', 'view')->name('delivery-man.view');
    // Edit Delivery Man Page
    Route::get('/crm/edit-delivery-man/{id}', 'edit')->name('delivery-man.edit');
    // Update Delivery Man Page
    Route::put('/crm/update-delivery-man/{id}', 'update')->name('delivery-man.update');
    // Delete Delivery Man Page 
    Route::delete('/crm/delete-delivery-man/{id}', 'delete')->name('delivery-man.delete');
});

// Delivery Man List Page
// Route::get('/crm/delivery-man', function () {
//     return view('/crm/delivery-man/index');
// })->name('delivery-man.index');

// Create Delivery Man Page
// Route::get('/crm/create-delivery-man', function () {
//     return view('/crm/delivery-man/create');
// })->name('delivery-man.create');

// View Delivery Man Page
// Route::get('/crm/view-delivery-man', function () {
//     return view('/crm/delivery-man/view');
// })->name('delivery-man.view');

// Edit Delivery Man Page
// Route::get('/crm/edit-delivery-man', function () {
//     return view('/crm/delivery-man/edit');
// })->name('delivery-man.edit');

// Order Delivery Page
Route::get('/crm/delivery-order', function () {
    return view('/crm/delivery-man/order');
})->name('delivery.order');

// Order Delivery Page
Route::get('/crm/delivery-order-detail', function () {
    return view('/crm/delivery-man/detail');
})->name('delivery.detail');

// Task Delivery Page
Route::get('/crm/delivery-order-tasks', function () {
    return view('/crm/delivery-man/task');
})->name('delivery.task');

// ------------------------------------------------------------ Sales Reports Page -------------------------------------------------------------

// Sales Reports Page
Route::controller(SaleReportController::class)->group(function () {
    Route::get('/crm/sales-report', 'index')->name('sales-reports.index');
});
// Route::get('/crm/sales-reports', function () {
//     return view('/crm/sales-reports/index');
// })->name('sales-reports.index');

// ------------------------------------------------------------ Leads Page -------------------------------------------------------------

Route::controller(LeadController::class)->group(function (){
    // Leads Page
    Route::get('/crm/leads', 'index')->name('leads.index');
    // Create Leads Page 
    Route::get('/crm/create-leads', 'create')->name('leads.create');
    // Store Leads Page 
    Route::post('/crm/store-leads','store')->name('leads.store');
    // View Leads Page 
    Route::get('/crm/view-leads/{id}', 'view')->name('leads.view');
    // Edit Leads Page 
    Route::get('/crm/edit-leads/{id}', 'edit')->name('leads.edit');
    // Update Leads Page
    Route::put('/crm/update-leads/{id}', 'update')->name('leads.update');
    // Delete Leads Page 
    Route::delete('/crm/delete-leads/{id}', 'delete')->name('leads.delete');
});
// Route::get('/crm/leads', function () {
//     return view('/crm/leads/index');
// })->name('leads.index');

// Create Lead Page
// Route::get('/crm/create-lead', function () {
//     return view('/crm/leads/create');
// })->name('leads.create');

// View Lead Page
// Route::get('/crm/view-lead', function () {
//     return view('/crm/leads/view');
// })->name('leads.view');

// Edit Lead Page
// Route::get('/crm/edit-lead', function () {
//     return view('/crm/leads/edit');
// })->name('leads.edit');

// ------------------------------------------------------------ Follow Up Page -------------------------------------------------------------

Route::controller(FollowUpController::class)->group(function () {
    // Follow Up Page
    Route::get('/crm/follow-up', 'index')->name('follow-up.index');
    // Create Follow Up Page 
    Route::get('/crm/create-follow-up', 'create')->name('follow-up.create');
    // Store Follow Up Page 
    Route::post('/crm/store-follow-up','store')->name('follow-up.store');
    // View Follow Up Page 
    Route::get('/crm/view-follow-up/{id}', 'view')->name('follow-up.view');
    // Edit Follow Up Page 
    Route::get('/crm/edit-follow-up/{id}', 'edit')->name('follow-up.edit');
    // Update Follow Up Page 
    Route::put('/crm/update-follow-up/{id}', 'update')->name('follow-up.update');
    // Delete Follow Up Page 
    Route::delete('/crm/delete-follow-up/{id}', 'delete')->name('follow-up.delete');
});
// Route::get('/crm/follow-up', function () {
//     return view('/crm/follow-up/index');
// })->name('follow-up.index');

// Create Follow Up Form Page
// Route::get('/crm/create-follow-up-form', function () {
//     return view('/crm/follow-up/create');
// })->name('follow-up-form.create');

// View Follow Up Form Page
// Route::get('/crm/view-follow-up-form', function () {
//     return view('/crm/follow-up/view');
// })->name('follow-up.view');

// Edit Follow Up Form Page
// Route::get('/crm/edit-follow-up-form', function () {
//     return view('/crm/follow-up/edit');
// })->name('follow-up.edit');

// ------------------------------------------------------------ Meets Pages -------------------------------------------------------------

Route::controller(MeetController::class)->group(function () {
    // Meet Page
    Route::get('/crm/meets', 'index')->name('meets.index');
    // Create Meet Page 
    Route::get('/crm/create-meets', 'create')->name('meets.create');
    // Store Meet Page 
    Route::post('/crm/store-meets','store')->name('meets.store');
    // View Meet Page 
    Route::get('/crm/view-meets/{id}', 'view')->name('meets.view');
    // Edit Meet Page 
    Route::get('/crm/edit-meets/{id}', 'edit')->name('meets.edit');
    // Update Meet Page 
    Route::put('/crm/update-meets/{id}', 'update')->name('meets.update');
    // Delete Meet Page 
    Route::delete('/crm/delete-meets/{id}', 'delete')->name('meets.delete');
});
// Route::get('/crm/meets', function () {
//     return view('/crm/meets/index');
// })->name('meets.index');

// Create Meet Page
// Route::get('/crm/create-meet', function () {
//     return view('/crm/meets/create');
// })->name('meets.create');

// View Meet Page
// Route::get('/crm/view-meet', function () {
//     return view('/crm/meets/view');
// })->name('meets.view');

// Edit Meet Page
// Route::get('/crm/edit-meet', function () {
//     return view('/crm/meets/edit');
// })->name('meets.edit');

// ------------------------------------------------------------ Quotation Page -------------------------------------------------------------

Route::controller(QuotationController::class)->group(function () {
    Route::get('/crm/quotation', 'index')->name('quotation.index');
    // Create Quotation Page 
    Route::get('/crm/create-quotation', 'create')->name('quotation.create');
    // Store Quotation Page 
    Route::post('/crm/store-quotation','store')->name('quotation.store');
    // View Quotation Page 
    Route::get('/crm/view-quotation/{id}', 'view')->name('quotation.view');
    // Edit Quotation Page 
    // Route::get('/crm/edit-quotation/{id}', 'edit')->name('quotation.edit');
    // Update Quotation Page 
    // Route::put('/crm/update-quotation/{id}', 'update')->name('quotation.update');
    // Delete Quotation Page 
    // Route::delete('/crm/delete-quotation/{id}', 'delete')->name('quotation.delete');
});
// Route::get('/crm/quotation', function () {
//     return view('/crm/quotation/index');
// })->name('quotation.index');

// Create Quotation Page
// Route::get('/crm/create-quotation', function () {
//     return view('/crm/quotation/create');
// })->name('quotation.create');

// View Quotation Page
// Route::get('/crm/view-quotation', function () {
//     return view('/crm/quotation/view');
// })->name('quotation.view');

// Edit Quotation Page
// Route::get('/crm/edit-quotation', function () {
//     return view('/crm/quotation/edit');
// })->name('quotation.edit');

// ------------------------------------------------------------ AMC Plans Page -------------------------------------------------------------

Route::controller(AmcController::class)->group(function (){
    // AMC Plans Page
    Route::get('/crm/amc-plans', 'index')->name('amc-plans.index');
    // Create AMC Plans Page 
    Route::get('/crm/create-amc-plans', 'create')->name('amc-plan.create');
    // Store AMC Plans Page 
    Route::post('/crm/store-amc-plans', 'store')->name('amc-plan.store');
    // Edit AMC Plans Page 
    Route::get('/crm/edit-amc-plans/{id}', 'edit')->name('amc-plan.edit');
    // Update AMC Plans Page  
    Route::put('/crm/update-amc-plans/{id}', 'update')->name('amc-plan.update');
    // Delete AMC Plans page 
    Route::delete('/crm/delete-amc-plans{id}', 'delete')->name('amc-plan.delete');
});
// Route::get('/crm/amc-plans', function () {
//     return view('/crm/amc-plans/index');
// })->name('amc-plans.index');

// Create AMC Plan Page
// Route::get('/crm/create-amc-plan', function () {
//     return view('/crm/amc-plans/create');
// })->name('amc-plan.create');

// Edit AMC Plan Page
// Route::get('/crm/edit-amc-plan', function () {
//     return view('/crm/amc-plans/edit');
// })->name('amc-plan.edit');

// ------------------------------------------------------------ Service Request Page -------------------------------------------------------------

Route::controller(ServiceRequestController::class)->group(function (){
    // Service Request Page
    Route::get('/crm/service-request', 'index')->name('service-request.index');

    // Create Service Request Page 
    Route::get('/crm/create-service-request', 'create')->name('service-request.create-servies');
    // View Service Request Page 
    Route::get('/crm/view-service-request', 'view')->name('service-request.view-service');
    // Edit Service Request Page 
    Route::get('/crm/edit-service-request', 'edit')->name('service-request.edit-service');

    // Create AMC Request Page 
    Route::get('/crm/create-amc-request', 'create_amc')->name('service-request.create-amc');
    // View AMC Request Page 
    Route::get('/crm/view-amc-request', 'view_amc')->name('service-request.view-amc');
    // Edit Amc Request Page 
    Route::get('/crm/edit-amc-request', 'edit_amc')->name('service-request.edit-amc');
}); 
// Service Request Page
// Route::get('/crm/service-request', function () {
//     return view('/crm/service-request/index');
// })->name('service-request.index');

// Create Service Request Page
// Route::get('/crm/create-service-request', function () {
//     return view('/crm/service-request/create-servies');
// })->name('service-request.create-servies');

// View Service Request Page
// Route::get('/crm/view-service-request', function () {
//     return view('/crm/service-request/view-service');
// })->name('service-request.view-service');

// Edit Service Request Page
// Route::get('/crm/edit-service-request', function () {
//     return view('/crm/service-request/edit-service');
// })->name('service-request.edit-service');

// Create AMC Request Page
// Route::get('/crm/create-amc-request', function () {
//     return view('/crm/service-request/create-amc');
// })->name('service-request.create-amc');

// Edit AMC Request Page
// Route::get('/crm/edit-amc-request', function () {
//     return view('/crm/service-request/edit-amc');
// })->name('service-request.edit-amc');

// ------------------------------------------------------------ Track Request Page -------------------------------------------------------------

Route::controller(TrackRequestController::class)->group(function() {
    // Track Request Page
    Route::get('/crm/track-request','index')->name('track-request.index');
});
// Route::get('/crm/track-request', function () {
//     return view('/crm/track-request/index');
// })->name('track-request.index');

// ------------------------------------------------------------ Case Transfer Page -------------------------------------------------------------

Route::controller(CaseTransferController::class)->group(function (){
    // Case Transfer Page
    Route::get('/crm/case-transfer','index')->name('case-transfer.index');
    // Create Case Transfer Page 
    Route::get('/crm/create-case-transfer', 'create')->name('case-transfer.create');

});
// Route::get('/crm/case-transfer', function () {
//     return view('/crm/case-transfer/index');
// })->name('case-transfer.index');

// Create Case Transfer Page
// Route::get('/crm/create-case-transfer', function () {
//     return view('/crm/case-transfer/create');
// })->name('case-transfer.create');

// View Case Transfer Page
Route::get('/crm/view-case-transfer', function () {
    return view('/crm/case-transfer/view');
})->name('case-transfer.view');

// ------------------------------------------------------------ Call Logs Page -------------------------------------------------------------

Route::controller(CallLogController::class)->group(function (){
    // Call Logs Page
    Route::get('/crm/call-logs', 'index')->name('call-logs.index');
    // View Logs Page 
    Route::get('/crm/view-call-logs','view')->name('call-logs.view');
});

// Route::get('/crm/call-logs', function () {
//     return view('/crm/call-logs/index');
// })->name('call-logs.index');

// View Call Log Page
// Route::get('/crm/create-call-log', function () {
//     return view('/crm/call-logs/view');
// })->name('call-logs.view');

// ------------------------------------------------------------ Activity Logs Page -------------------------------------------------------------

Route::controller(ActivityLogController::class)->group( function (){
    // Activity Logs Page
    Route::get('/crm/activity-logs', 'index')->name('activity-logs.index');
});
// Route::get('/crm/activity-logs', function () {
//     return view('/crm/activity-logs/index');
// })->name('activity-logs.index');

// ------------------------------------------------------------ Pincodes Page -------------------------------------------------------------

Route::controller(PincodeController::class)->group( function (){
    // Pincodes Page
    Route::get('/crm/manage-pincodes','index')->name('pincodes.index');
    // Create Pincode Page  
    Route::get('/crm/create-manage-pincodes','create')->name('pincodes.create');
    // Store Pincode Page 
    Route::post('/crm/store-manage-pincodes','store')->name('pincodes.store');
    // Edit Pincode Page 
    Route::get('/crm/edit-manage-pincodes/{id}','edit')->name('pincodes.edit');
    // Delete Pincode Page 
    Route::delete('/crm/delete-manage-pincode/{id}','delete')->name('pincodes.delete');
});
// Route::get('/crm/pincodes', function () {
//     return view('/crm/manage-pincodes/index');
// })->name('pincodes.index');

// Create Pincode Page
// Route::get('/crm/create-pincode', function () {
//     return view('/crm/manage-pincodes/create');
// })->name('manage-pincodes.create');

// View Pincode Page
// Route::get('/crm/edit-pincode', function () {
//     return view('/crm/manage-pincodes/edit');
// })->name('manage-pincodes.edit');

// ------------------------------------------------------------ Pickup Requests Page -------------------------------------------------------------

Route::controller(PickupRequestController::class)->group(function (){
    // Pickup Requests Page
    Route::get('/crm/pickup-requests','index')->name('pickup-requests.index');
    // View Request Page 
    Route::get('/crm/view-pickup-requests/', 'view')->name('pickup-request.view');
});
// Route::get('/crm/pickup-requests', function () {
//     return view('/crm/pickup-requests/index');
// })->name('pickup-requests.index');

// View Pickup Request Page
// Route::get('/crm/view-pickup-request', function () {
//     return view('/crm/pickup-requests/view');
// })->name('pickup-request.view');

// ------------------------------------------------------------ View Jobs Page -------------------------------------------------------------

Route::controller(JobController::class)->group(function(){
    // View Jobs Page
    Route::get('/crm/jobs','index')->name('jobs.index');
    // Create Jobs Page 
    Route::get('/crm/create-job','create')->name('jobs.create');
    // Store Job Page 
    Route::post('/crm/store-jobs','store')->name('jobs.store');
    // View Job Page 
    Route::get('/crm/view-jobs/{id}', 'view')->name('jobs.view');
    // Edit Job Page 
    Route::get('/crm/edit-jobs/{id}', 'edit')->name('jobs.edit');
    // Delete Job Page 
    Route::delete('/crm/delete-jobs/{id}','delete')->name('jobs.delete');
});
// Route::get('/crm/jobs', function () {
//     return view('/crm/jobs/index');
// })->name('jobs.index');

// Create Job Page
// Route::get('/crm/create-job', function () {
//     return view('/crm/jobs/create');
// })->name('jobs.create');

// View Job Page
// Route::get('/crm/view-job', function () {
//     return view('/crm/jobs/view');
// })->name('jobs.view');

// Edit Job Page
// Route::get('/crm/edit-job', function () {
//     return view('/crm/jobs/edit');
// })->name('jobs.edit');

// ------------------------------------------------------------ Assigned Jobs Page -------------------------------------------------------------

Route::controller(AssignedJobController::class)->group(function (){
    // Assigned Jobs Page
    Route::get('/crm/assigned-jobs','index')->name('assigned-jobs.index');
    // View Assigned Jobs Page 
    Route::get('/crm/view-assigned-job','view')->name('assigned-jobs.view');
    // Edit Assigned Jobs Page 
    Route::get('/crm/edit-assiged-jobs','edit')->name('assigned-jobs.edit');
});
// Route::get('/crm/assigned-jobs', function () {
//     return view('/crm/assigned-jobs/index');
// })->name('assigned-jobs.index');

// Create Assigned Job Page
// Route::get('/crm/view-assigned-job', function () {
//     return view('/crm/assigned-jobs/view');
// })->name('assigned-jobs.view');

// View Assigned Job Page
// Route::get('/crm/edit-assigned-job', function () {
//     return view('/crm/assigned-jobs/edit');
// })->name('assigned-jobs.edit');

// ------------------------------------------------------------ Field Issues Page -------------------------------------------------------------

Route::controller(FieldIssuesController::class)->group(function (){
    // Field Issues Page
    Route::get('/crm/field-issues','index')->name('field-issues.index');
    // View Field Issues Page 
    Route::get('/crm/view-field-issues','view')->name('field-issues.view');
    // Edit Field Issues Page 
    Route::get('/crm/edit-field-issues','edit')->name('field-issues.edit');
});
// Route::get('/crm/field-issues', function () {
//     return view('/crm/field-issues/index');
// })->name('field-issues.index');

// Create Field Issue Page
// Route::get('/crm/view-field-issue', function () {
//     return view('/crm/field-issues/view');
// })->name('field-issues.view');

// Edit Field Issue Page
// Route::get('/crm/edit-field-issue', function () {
//     return view('/crm/field-issues/edit');
// })->name('field-issues.edit');

// ------------------------------------------------------------ Spare Parts Page -------------------------------------------------------------

Route::controller(SparePartController::class)->group(function (){
    // Spare Parts Requests Page
    Route::get('/crm/spare-parts-requests','index')->name('spare-parts-requests.index');
    // View Parts Requests Page 
    Route::get('/crm/view-spare-parts-requests','view')->name('spare-parts-requests.view');
});
// Route::get('/crm/spare-parts-requests', function () {
//     return view('/crm/spare-parts-requests/index');
// })->name('spare-parts-requests.index');

// View Spare Parts Request Page
// Route::get('/crm/view-spare-parts-request', function () {
//     return view('/crm/spare-parts-requests/view');
// })->name('spare-parts-requests.view');

// ------------------------------------------------------------ Assign Products Page -------------------------------------------------------------

Route::controller(InHandProductController::class)->group(function (){
    // In Hand Products Page
    Route::get('/crm/in-hand-products','index')->name('in-hand-products.index');
    // View In Hand Products Page 
    Route::get('/crm/view-in-hand-products','view')->name('assign-products.view');
});
// Route::get('/crm/in-hand-products', function () {
//     return view('/crm/assign-products/index');
// })->name('in-hand-products.index');

// View In Hand Product Page
// Route::get('/crm/view-in-hand-product', function () {
//     return view('/crm/assign-products/view');
// })->name('assign-products.view');

// ------------------------------------------------------------ Assign Products Page -------------------------------------------------------------

Route::controller(SupportTicketController::class)->group(function (){
    // Support Ticket Page
    Route::get('/crm/support-ticket','index')->name('support-ticket.index');
    // View Support Ticket Page 
    Route::get('/crm/view-support-ticket','view')->name('support-ticket.view');
});
// Route::get('/crm/support-ticket', function () {
//     return view('/crm/support-ticket/index');
// })->name('support-ticket.index');

// View Support Ticket Page
// Route::get('/crm/view-support-ticket', function () {
//     return view('/crm/support-ticket/view');
// })->name('support-ticket.view');

// ------------------------------------------------------------ Assign Products Page -------------------------------------------------------------

Route::controller(InvoiceController::class)->group(function (){
    // Invoice Page
    Route::get('/crm/invoice','index')->name('invoice.index');
});
// Route::get('/crm/invoice', function () {
//     return view('/crm/invoice/index');
// })->name('invoice.index');




// *******************************************************************************************************************************************************
// *******************************************************************************************************************************************************
// **************************************************************      Warehouse       *******************************************************************
// *******************************************************************************************************************************************************
// *******************************************************************************************************************************************************



// Index Page 
Route::get('/warehouse/index', function () {
    return view('/warehouse/index');
})->name('warehouse/index');

// ------------------------------------------------------------ Products List -------------------------------------------------------------

Route::controller(ProductListController::class)->group(function(){
    // Products List Page
    Route::get('/warehouse/product-list','index')->name('products.index');
    // Create Product Page 
    Route::get('/warehouse/create-product', 'create')->name('product-list.create');
    // View Product Page 
    Route::get('/warehouse/view-product-list', 'view')->name('product-list.view');
    // Edit Products Page 
    Route::get('/warehouse/edit-product-list', 'edit')->name('product-list.edit');
    // Scrap Items Page
    Route::get('/warehouse/scrap-items', 'scrapItems')->name('product-list.scrap-items');
});
// Route::get('/warehouse/products', function () {
//     return view('/warehouse/product-list/index');
// })->name('products.index');

// Create Product Page
// Route::get('/warehouse/create-product', function () {
//     return view('/warehouse/product-list/create');
// })->name('product-list.create');

// View Product Page
// Route::get('/warehouse/view-product', function () {
//     return view('/warehouse/product-list/view');
// })->name('product-list.view');

// Edit Product Page
// Route::get('/warehouse/edit-product', function () {
//     return view('/warehouse/product-list/edit');
// })->name('product-list.edit');

// Scrap Items Page
// Route::get('/warehouse/scrap-items', function () {
//     return view('/warehouse/product-list/scrap-items');
// })->name('product-list.scrap-items');

// ------------------------------------------------------------ Track Product List -------------------------------------------------------------

Route::controller(TrackProductController::class)->group(function (){
    // Track Product List Page
    Route::get('/warehouse/track-product-list', 'index')->name('track-product.index');
});
// Track Product List Page
// Route::get('/warehouse/track-product-list', function () {
//     return view('/warehouse/track-product/index');
// })->name('track-product.index');

// ------------------------------------------------------------ Spare Parts List -------------------------------------------------------------

Route::controller(SparePartController::class)->group(function (){
    // Spare Parts Requests
    Route::get('/warehouse/spare-parts', 'index')->name('spare-parts.index');
    // View Spare Part Requests
    Route::get('/warehouse/view-spare-part', 'view')->name('spare-parts.view');
});
// Spare Parts Requests
// Route::get('/warehouse/spare-parts-requests', function () {
//     return view('/warehouse/spare-parts-requests/index');
// })->name('spare-parts.index');

// View Spare Part Request Page
// Route::get('/warehouse/view-spare-part-request', function () {
//     return view('/warehouse/spare-parts-requests/view');
// })->name('spare-parts.view');

// ------------------------------------------------------------ Warehouse Page ------------------------------------------------------------

Route::controller(WarehouseController::class)->group(function (){
    // Warehouses List Page
    Route::get('/warehouse/warehouses-list', 'index')->name('warehouses-list.index');
    // Create Warehouse Page
    Route::get('/warehouse/create-warehouse', 'create')->name('warehouse-list.create');
    // View Warehouse Page
    Route::get('/warehouse/view-warehouse-list', 'view')->name('warehouses-list.view');
    // Edit Warehouse Page
    Route::get('/warehouse/edit-warehouse', 'edit')->name('warehouses-list.edit');
});
// Warehouses List Page
// Route::get('/warehouse/warehouses-list', function () {
//     return view('/warehouse/warehouses-list/index');
// })->name('warehouses-list.index');

// Create Warehouse Page
// Route::get('/warehouse/create-warehouse', function () {
//     return view('/warehouse/warehouses-list/create');
// })->name('warehouse-list.create');

// View Warehouse Page
// Route::get('/warehouse/view-warehouse', function () {
//     return view('/warehouse/warehouses-list/view');
// })->name('warehouses-list.view');

// Edit Warehouse Page
// Route::get('/warehouse/edit-warehouse', function () {
//     return view('/warehouse/warehouses-list/edit');
// })->name('warehouses-list.edit');

// ------------------------------------------------------------ Warehouse Rack Page -------------------------------------------------------------

Route::controller(WarehouseRackController::class)->group(function (){
    // Warehouse Rack Page
    Route::get('/warehouse/rack', 'index')->name('rack.index');
    // Create Warehouse Rack Page
    Route::get('/warehouse/create-rack', 'create')->name('rack.create');
    // Edit Warehouse Rack Page
    Route::get('/warehouse/edit-rack', 'edit')->name('rack.edit');
});
// Warehouse Rack Page
// Route::get('/warehouse/rack', function () {
//     return view('/warehouse/rack/index');
// })->name('rack.index');

// Create Rack Page
// Route::get('/warehouse/create-rack', function () {
//     return view('/warehouse/rack/create');
// })->name('rack.create');

// Edit Rack Page
// Route::get('/warehouse/edit-rack', function () {
//     return view('/warehouse/rack/edit');
// })->name('rack.edit');

// ------------------------------------------------------------ Vendor Purchase Page -------------------------------------------------------------

Route::controller(VendorPurchaseBillController::class)->group(function (){
    // Vendor Purchase Page
    Route::get('/warehouse/vendor-purchase-bills' ,'index')->name('vendor.index');
    // Create Vendor Purchase Page
    Route::get('/warehouse/create-vendor-purchase-bill' ,'create')->name('vendor.create');
    // View Vendor Purchase Page
    Route::get('/warehouse/view-vendor-purchase-bill' ,'view')->name('vendor.view');
});
// Vendor Purchase Page
// Route::get('/warehouse/vendor-purchase-bills', function () {
//     return view('/warehouse/vendor-purchase-bills/index');
// })->name('vendor.index');

// Create Vendor Purchase Page 
// Route::get('/warehouse/create-vendor-purchase-bill', function () {
//     return view('/warehouse/vendor-purchase-bills/create');
// })->name('vendor.create');

// View Vendor Purchase Page 
// Route::get('/warehouse/view-vendor-puschase-bills', function () {
//     return view('/warehouse/vendor-purchase-bills/view');
// })->name('vendor.view');

// ------------------------------------------------------------ Vendor Purchase Page -------------------------------------------------------------

Route::controller(StockReportController::class)->group(function (){
    // Stock Report Page 
    Route::get('/warehouse/stock-requests' ,'warehouse_index')->name('stock-request.index');
    // Create Stock Report Page
    Route::get('/warehouse/create-stock-request' ,'warehouse_create')->name('stock-request.create');
    // Edit Stock Report Page
    Route::get('/warehouse/edit-stock-request' ,'warehouse_edit')->name('stock-request.edit');
});
// Stock Report Page 
// Route::get('/warehouse/stock-reports', function () {
//     return view('/warehouse/stock-request/index');
// })->name('stock-request.index');

// Create Report Page 
// Route::get('/warehouse/create-stock-reports', function () {
//     return view('/warehouse/stock-request/create');
// })->name('stock-request.create');

// Edit Report Page 
// Route::get('/warehouse/edit-stock-reports', function () {
//     return view('/warehouse/stock-request/edit');
// })->name('stock-request.edit');

// ------------------------------------------------------------ Low Stock Page -------------------------------------------------------------

Route::controller(LowStockController::class)->group(function (){
    // Low Stock Page 
    Route::get('/warehouse/low-stock-alert' , 'warehouse_index')->name('low-stock.index');
});
// Low Stock Page 
// Route::get('/warehouse/low-stock-alert', function () {
//     return view('/warehouse/low-stock-alert/index');
// })->name('low-stock.index');






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
    Route::get('/e-commerce/create-sustomer' ,'ec_create')->name('ec.customer.create');
    // View EC Customer Page
    Route::get('/e-commerce/view-customer' ,'ec_view')->name('ec.customer.view');
    // Edit EC Customer Page
    Route::get('/e-commerce/edit-customer' ,'ec_edit')->name('ec.customer.edit');
});
// E-commerce Customer Page 
// Route::get('/e-commerce/customers', function () {
//     return view('/e-commerce/customer/index');
// })->name('ec.customer.index');

// Create Customer Page
// Route::get('/e-commerce/create-customers', function () {
//     return view('/e-commerce/customer/create');
// })->name('ec.customer.create');

// View Customer Page 
// Route::get('/e-commerce/view-customers', function () {
//     return view('/e-commerce/customer/view');
// })->name('ec.customer.view');

// Edit Customer Page 
// Route::get('/e-commerce/edit-customers', function () {
//     return view('/e-commerce/customer/edit');
// })->name('ec.customer.edit');

// ------------------------------------------------------------ E-Commerce Order Page -------------------------------------------------------------

Route::controller(OrderController::class)->group(function (){
    // Order Page 
    Route::get('/e-commerce/order' ,'index')->name('order.index');
    // Create Order Page
    Route::get('/e-commerce/create-order' ,'create')->name('order.create');
    // View Order Page
    Route::get('/e-commerce/view-order' ,'view')->name('order.view');
});
// Order Page 
// Route::get('/e-commerce/order', function () {
//     return view('/e-commerce/order/index');
// })->name('order.index');

// Create Order Page 
// Route::get('/e-commerce/create-order', function () {
//     return view('/e-commerce/order/create');
// })->name('order.create');

// View Order Page 
// Route::get('/e-commerce/view-order', function () {
//     return view('/e-commerce/order/view');
// })->name('order.view');

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
// Product Page 
// Route::get('/e-commerce/products', function () {
//     return view('/e-commerce/products/index');
// })->name('ec.product.index');

// Create Product Page 
// Route::get('/e-commerce/create-products', function () {
//     return view('/e-commerce/products/create');
// })->name('ec.product.create');

// View Product Page 
// Route::get('/e-commerce/view-products', function () {
//     return view('/e-commerce/products/view');
// })->name('ec.product.view');

// Edit Product Page 
// Route::get('/e-commerce/edit-products', function () {
//     return view('/e-commerce/products/edit');
// })->name('ec.product.edit');

// Scrab Items Product Page 
// Route::get('/e-commerce/scrab-items', function () {
//     return view('/e-commerce/products/scrap-items');
// })->name('scrap-items');

// ------------------------------------------------------------ E-Commerce Categories Page -------------------------------------------------------------

Route::controller(CategorieController::class)->group(function (){
    // Categorie Page 
    Route::get('/e-commerce/categories' ,'index')->name('category.index');
    // Create Categorie Page
    Route::get('/e-commerce/create-categorie' ,'create')->name('category.create');
    // Edit Create Categorie Page 
    Route::get('/e-commerce/edit-categorie' ,'edit')->name('category.edit');
});
// Categorie Page 
// Route::get('/e-commerce/categories', function () {
//     return view('/e-commerce/categories/index');
// })->name('category.index');

// Create Categorie Page 
// Route::get('/e-commerce/create-categories', function () {
//     return view('/e-commerce/categories/create');
// })->name('category.create');

// Edit Categorie Page 
// Route::get('/e-commerce/edit-categories', function () {
//     return view('/e-commerce/categories/edit');
// })->name('category.edit');

// ------------------------------------------------------------ E-Commerce Brands Page -------------------------------------------------------------

Route::controller(BrandController::class)->group(function (){
    // Brands Page 
    Route::get('/e-commerce/brands' ,'index')->name('brand.index');
    // Create Brands Page 
    Route::get('/e-commerce/create-brand' ,'create')->name('brand.create');
    // Edit Brands Page
    Route::get('/e-commerce/edit-brand' ,'edit')->name('brand.edit');
});
// Brands Page 
// Route::get('/e-commerce/brands', function () {
//     return view('/e-commerce/brands/index');
// })->name('brand.index');

// Create Brands Page 
// Route::get('/e-commerce/create-brands', function () {
//     return view('/e-commerce/brands/create');
// })->name('brand.create');

// Edit Brands Page 
// Route::get('/e-commerce/edit-brands', function () {
//     return view('/e-commerce/brands/edit');
// })->name('brand.edit');

// ------------------------------------------------------------ E-Commerce Product Variants Page -------------------------------------------------------------

Route::controller(ProductVariantsController::class)->group(function (){
    // Product Variants Page 
    Route::get('/e-commerce/product-variants' ,'index')->name('variant.index');
    // Product Attribute List Page
    Route::get('/e-commerce/product-attribute-list' ,'view')->name('variant.view');
});
// Product Variants Page 
// Route::get('/e-commerce/product-variants', function () {
//     return view('/e-commerce/product-variants/index');
// })->name('variant.index');

// Product Attribute List Page 
// Route::get('/e-commerce/product-attribute-list', function () {
//     return view('/e-commerce/product-variants/view');
// })->name('variant.view');

// ------------------------------------------------------------ E-Commerce Coupons Page -------------------------------------------------------------

Route::controller(CouponsController::class)->group(function (){
    // Coupons Page 
    Route::get('/e-commerce/coupons' ,'index')->name('coupon.index');
    // Create Coupons Page
    Route::get('/e-commerce/create-coupons' ,'create')->name('coupon.create');
    // Edit Coupons Page
    Route::get('/e-commerce/edit-coupons' ,'edit')->name('coupon.edit');
});
// Coupons Page     
// Route::get('/e-commerce/coupons', function () {
//     return view('/e-commerce/coupons/index');
// })->name('coupon.index');

// Create Coupons Page 
// Route::get('/e-commerce/create-coupons', function () {
//     return view('/e-commerce/coupons/create');
// })->name('coupon.create');

// Edit Coupons Page 
// Route::get('/e-commerce/edit-coupons', function () {
//     return view('/e-commerce/coupons/edit');
// })->name('coupon.edit');

// ------------------------------------------------------------ E-Commerce Subscribers Page -------------------------------------------------------------

Route::controller(SubscriberController::class)->group(function (){
    // Subscribers Page
    Route::get('/e-commerce/subscribers' ,'index')->name('subscriber.index');
    // Send Mail Page
    Route::get('/e-commerce/send-mail-subscriber' , 'sendMail')->name('subscriber.send-mail');
});
// Subscribers Page 
// Route::get('/e-commerce/subscribers', function () {
//     return view('/e-commerce/subscribers/index');
// })->name('subscriber.index');

// Send Mail Page 
// Route::get('/e-commerce/send-mail-subscriber', function () {
//     return view('/e-commerce/subscribers/send-mail');
// })->name('subscriber.send-mail');

// ------------------------------------------------------------ E-Commerce Contact Page -------------------------------------------------------------

// Contact Page 
Route::get('/e-commerce/contacts', [ContactController::class, 'index'])->name('contact.index');
// Route::get('/e-commerce/contacts', function () {
//     return view('/e-commerce/contacts/index');
// })->name('contact.index');

// ------------------------------------------------------------ E-Commerce Website Banner Page -------------------------------------------------------------

Route::controller(BannerController::class)->group(function (){
    // Website Banner Page
    Route::get('/e-commerce/website-banner' ,'websiteBanner')->name('website.banner.index');
    // Add Website Banner Page
    Route::get('/e-commerce/add-banner' ,'addWebsiteBanner')->name('website.banner.create');
    // Edit Website Banner Page
    Route::get('/e-commerce/edit-banner' ,'editWebsiteBanner')->name('website.banner.edit');

    // Promotional Banner Page
    Route::get('/e-commerce/promotional-banner' ,'promotionalBanner')->name('promotional.banner.index');
    // Add Promotional Banner Page
    Route::get('/e-commerce/add-promotional-banner' ,'addPromotionalBanner')->name('promotional.banner.create');
    // Edit Promotional Banner Page
    Route::get('/e-commerce/edit-promotional-banner' ,'editPromotionalBanner')->name('promotional.banner.edit');
});
// Website Banner Page 
// Route::get('/e-commerce/website-banner', function () {
//     return view('/e-commerce/banner/website-banner/index');
// })->name('website.banner.index');

// Add Website Banner Page 
// Route::get('/e-commerce/add-banner', function () {
//     return view('/e-commerce/banner/website-banner/create');
// })->name('website.banner.create');

// Edit Website Banner Page 
// Route::get('/e-commerce/edit-banner', function () {
//     return view('/e-commerce/banner/website-banner/edit');
// })->name('website.banner.edit');

// ------------------------------------------------------------ E-Commerce Promotional Banner Page -------------------------------------------------------------

// Promotional Banner Page 
// Route::get('/e-commerce/promotional-banner', function () {
//     return view('/e-commerce/banner/promotional-banner/index');
// })->name('promotional.banner.index');

// Add Promotional Banner Page 
// Route::get('/e-commerce/add-promotional-banner', function () {
//     return view('/e-commerce/banner/promotional-banner/create');
// })->name('promotional.banner.create');

// Edit Promotional Banner Page 
// Route::get('/e-commerce/edit-promotional-banner', function () {
//     return view('/e-commerce/banner/promotional-banner/edit');
// })->name('promotional.banner.edit');

// ------------------------------------------------------------ E-Commerce Product Deals Page -------------------------------------------------------------

Route::controller(ProductDealController::class)->group(function (){
    // Product Deals Page
    Route::get('/e-commerce/product-deals' ,'index')->name('product-deals.index');
    // Add Product Deals Page
    Route::get('/e-commerce/add-product-deals' ,'create')->name('product-deals.create');
    // Edit Product Deals Page
    Route::get('/e-commerce/edit-product-deals' ,'edit')->name('product-deals.edit');
});
// Product Deals Page 
// Route::get('/e-commerce/product-deals', function () {
//     return view('/e-commerce/product-deals/index');
// })->name('product-deals.index');

// Add Product Deals Page 
// Route::get('/e-commerce/add-product-deals', function () {
//     return view('/e-commerce/product-deals/create');
// })->name('product-deals.create');

// Edit Product Deals Page 
// Route::get('/e-commerce/edit-product-deals', function () {
//     return view('/e-commerce/product-deals/edit');
// })->name('product-deals.edit');

// ------------------------------------------------------------ E-Commerce Collection Page -------------------------------------------------------------

Route::controller(CollectionController::class)->group(function (){
    // Collection Deals Page 
    Route::get('/e-commerce/collections' ,'index')->name('collection.index');
    // Add Collection Deals Page
    Route::get('e-commerce/add-collections' ,'create')->name('collection.create');
    // Edit Collection Deals Page
    Route::get('/e-commerce/edit-collections' ,'edit')->name('collection.edit');
});
// Collection Deals Page 
// Route::get('/e-commerce/collections', function () {
//     return view('/e-commerce/collection/index');
// })->name('collection.index');

// Add Collection Deals Page 
// Route::get('/e-commerce/add-collections', function () {
//     return view('/e-commerce/collection/create');
// })->name('collection.create');

// Edit Collection Deals Page 
// Route::get('/e-commerce/edit-collections', function () {
//     return view('/e-commerce/collection/edit');
// })->name('collection.edit');

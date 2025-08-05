<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AmcController;
use App\Http\Controllers\AssignedJobController;
use App\Http\Controllers\CallLogController;
use App\Http\Controllers\CaseTransferController;
use App\Http\Controllers\ClientReceiptController;
use App\Http\Controllers\CreditorsReportController;
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
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayToVendorController;
use App\Http\Controllers\PickupRequestController;
use App\Http\Controllers\PincodeController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\ReimbursementController;
use App\Http\Controllers\SaleReportController;
use App\Http\Controllers\SalesInvoicingController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\StockReportController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\TrackRequestController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WithdrawController;


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

// Payment Page
Route::get('/crm/payments', [PaymentController::class, 'index'])->name('payments');

// Reimbursement Page
Route::get('/crm/reimbursement', [ReimbursementController::class, 'index'])->name('reimbursement');

// Withdraw Page
Route::get('/crm/withdraw', [WithdrawController::class, 'index'])->name('withdraw');

// KYC Log Page
Route::get('/crm/kyc-log', [KycLogController::class, 'index'])->name('kyc-log');


// ######################## Sales Invoicing  ########################

Route::controller(SalesInvoicingController::class)->group(function (){
    //  Sales Invoicing List Page
    Route::get('/crm/sales-invoicing', 'index')->name('sales.index');
    // Create Sales Invoicing List Page 
    Route::get('/crm/create-sales-invoicing','create')->name('sales.create');
    // View Sales Invoicing List Page 
    Route::get('/crm/view-sales-invoicing','view')->name('sales.view');
});

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

// ######################## Payments to Vendors  ########################

Route::controller(PayToVendorController::class)->group(function(){
    // Payments to Vendors List Page
    Route::get('/crm/payments-to-vendor','index')->name('pay-to-vendors.index');
    // Create Payments to Vendors List Page 
    Route::get('/crm/create-payments-to-vendor','create')->name('pay-to-vendors.create');
});

// ######################## Creditors Report  ########################

Route::controller(CreditorsReportController::class)->group(function(){
    // Creditors Report List Page
    Route::get('/crm/creditors-report', 'index')->name('creditors-report.index');
});

// ######################## Expenses  ########################

Route::controller(ExpensesController::class)->group(function (){
    // Expenses List Page
    Route::get('/crm/expenses', 'index')->name('expenses.index');
    // Expenses Create Page 
    Route::get('/crm/create-expenses', 'create')->name('expenses.create');
});

// ######################## Stock Request  ########################

Route::controller(StockReportController::class)->group(function (){
    // Stock Request Page
    Route::get('/crm/stock-report','index')->name('stock-report.index');
    // Stock Request Create Page 
    Route::get('/crm/create-stock-report','create')->name('stock-report.create');
    // Stock Request Edit Page 
    Route::get('/crm/edit-stock-report','edit')->name('stock-report.edit');
});

// ######################## Low Stock Alert  ########################

Route::controller(LowStockController::class)->group(function (){
    // Low Stock Alert Page
    Route::get('/crm/low-stock-alert', 'index')->name('low-stock-alert');
});

// ------------------------------------------------------------ Customer Page -------------------------------------------------------------

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

// ------------------------------------------------------------ Track Request Page -------------------------------------------------------------

Route::controller(TrackRequestController::class)->group(function() {
    // Track Request Page
    Route::get('/crm/track-request','index')->name('track-request.index');
});

// ------------------------------------------------------------ Case Transfer Page -------------------------------------------------------------

Route::controller(CaseTransferController::class)->group(function (){
    // Case Transfer Page
    Route::get('/crm/case-transfer','index')->name('case-transfer.index');
    // Create Case Transfer Page 
    Route::get('/crm/create-case-transfer', 'create')->name('case-transfer.create');
});

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

// ------------------------------------------------------------ Activity Logs Page -------------------------------------------------------------

Route::controller(ActivityLogController::class)->group( function (){
    // Activity Logs Page
    Route::get('/crm/activity-logs', 'index')->name('activity-logs.index');
});

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

// ------------------------------------------------------------ Pickup Requests Page -------------------------------------------------------------

Route::controller(PickupRequestController::class)->group(function (){
    // Pickup Requests Page
    Route::get('/crm/pickup-requests','index')->name('pickup-requests.index');
    // View Request Page 
    Route::get('/crm/view-pickup-requests/', 'view')->name('pickup-request.view');
});

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

// ------------------------------------------------------------ Assigned Jobs Page -------------------------------------------------------------

Route::controller(AssignedJobController::class)->group(function (){
    // Assigned Jobs Page
    Route::get('/crm/assigned-jobs','index')->name('assigned-jobs.index');
    // View Assigned Jobs Page 
    Route::get('/crm/view-assigned-job','view')->name('assigned-jobs.view');
    // Edit Assigned Jobs Page 
    Route::get('/crm/edit-assiged-jobs','edit')->name('assigned-jobs.edit');
});

// ------------------------------------------------------------ Field Issues Page -------------------------------------------------------------

Route::controller(FieldIssuesController::class)->group(function (){
    // Field Issues Page
    Route::get('/crm/field-issues','index')->name('field-issues.index');
    // View Field Issues Page 
    Route::get('/crm/view-field-issues','view')->name('field-issues.view');
    // Edit Field Issues Page 
    Route::get('/crm/edit-field-issues','edit')->name('field-issues.edit');
});

// ------------------------------------------------------------ Spare Parts Page -------------------------------------------------------------

Route::controller(SparePartController::class)->group(function (){
    // Spare Parts Requests Page
    Route::get('/crm/spare-parts-requests','index')->name('spare-parts-requests.index');
    // View Parts Requests Page 
    Route::get('/crm/view-spare-parts-requests','view')->name('spare-parts-requests.view');
});

// ------------------------------------------------------------ Assign Products Page -------------------------------------------------------------

Route::controller(InHandProductController::class)->group(function (){
    // In Hand Products Page
    Route::get('/crm/in-hand-products','index')->name('in-hand-products.index');
    // View In Hand Products Page 
    Route::get('/crm/view-in-hand-products','view')->name('assign-products.view');
});

// ------------------------------------------------------------ Assign Products Page -------------------------------------------------------------

Route::controller(SupportTicketController::class)->group(function (){
    // Support Ticket Page
    Route::get('/crm/support-ticket','index')->name('support-ticket.index');
    // View Support Ticket Page 
    Route::get('/crm/view-support-ticket','view')->name('support-ticket.view');
});

// ------------------------------------------------------------ Assign Products Page -------------------------------------------------------------

Route::controller(InvoiceController::class)->group(function (){
    // Invoice Page
    Route::get('/crm/invoice','index')->name('invoice.index');
});
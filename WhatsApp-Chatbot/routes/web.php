<?php

use App\Http\Controllers\Add_Invoice_controlle;
use App\Http\Controllers\Invoice_Controller;
use App\Http\Controllers\PDFcontroller;
use App\Http\Controllers\SendWhatsAppMessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsAppController;
use  App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisplayDataController;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\DisplayingDataController;
use App\Http\Controllers\QRcodeGenerater;
use App\Http\Controllers\SubdomainController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin-view');
});

Route::get('/PhoneNumberCheck', function () {
    return view('PhoneNumberCheck');
});



Route::get('/send-whatsapp', [WhatsAppController::class, 'SendWhatsAppMessage']);
Route::get('/download-pdf', [PDFcontroller::class, 'PDFDownloader']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dd', [DisplayingDataController::class, 'DisplayDashboard']);
// Route::get('/getuser', [DashboardController::class, 'DisplayData']);
Route::get('/display_invoices', [Add_Invoice_controlle::class, 'ShowInvoice']);
Route::get('/delete/{id}', [Add_Invoice_controlle::class, 'DeleteInvoice']);
Route::get('/edit/{id}', [Add_Invoice_controlle::class, 'EditInvoice']);
Route::get('/ViewInvoices/{id}', [Add_Invoice_controlle::class, 'ViewInvoice']);
Route::get('/download_invoice/{id}', [Add_Invoice_controlle::class, 'DownloadInvoice']);
Route::get('/trashed_users', [Add_Invoice_controlle::class, 'TrashedCustomers']);
Route::get('/trash_restore/{id}', [Add_Invoice_controlle::class, 'RestoreTrashedUsers']);
Route::get('/trash_remove/{id}', [Add_Invoice_controlle::class, 'RemoveTrashedUsers']);
Route::get('/get_add_invoice_data', [Add_Invoice_controlle::class, 'AddInvoice']);




Route::post('/Send-Messages', [SendWhatsAppMessageController::class, 'SendFormMessage']);
Route::post('/invoice-submit', [Invoice_Controller::class, 'Invoicefunction']);
Route::post('/add_invoice_data', [Add_Invoice_controlle::class, 'AddInvoice']);
Route::post('QR_generater', [QRcodeGenerater::class, 'QRGenerate']);
Route::post('/user_check', [Add_Invoice_controlle::class, 'Phone']);



Route::put('final_edit/{id}', [Add_Invoice_controlle::class, 'FinalEdit']);




Route::view('/logins', 'form');
Route::view('/login-Page', 'LoginPage');
Route::view('/pdf', 'PDFDownloader');
Route::view('/invoice-form', 'Invoice-Form');
Route::view('/dashboard', '/Dashboard');
Route::view('/dash', 'Dashboard');
Route::view('/invoice_dash', 'Invoice_Dashboard');
Route::view('/add_invoice', 'Add_Invoice');
Route::view('/ViewInvoices', 'ViewInvoices');
Route::view('/generate_qr', 'GenerateQR');
Route::view('/QRList', 'QRList');
Route::view('/delete', 'delete');
Route::view('/abc', 'PhoneNumberCheck');

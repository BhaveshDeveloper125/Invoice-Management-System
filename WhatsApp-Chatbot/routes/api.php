<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Add_Invoice_controlle;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\PDFcontroller;
use App\Http\Controllers\DisplayingDataController;
use App\Http\Controllers\SendWhatsAppMessageController;
use App\Http\Controllers\Invoice_Controller;
use App\Http\Controllers\QRcodeGenerater;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/send-whatsapp', [WhatsAppController::class, 'SendWhatsAppMessage']); //OK
Route::get('/download-pdf', [PDFcontroller::class, 'PDFDownloader']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dd', [DisplayingDataController::class, 'DisplayDashboard']);
// Route::get('/getuser', [DashboardController::class, 'DisplayData']);
Route::get('/display_invoices', [Add_Invoice_controlle::class, 'ShowInvoice']);
Route::get('/delete/{id}', [Add_Invoice_controlle::class, 'DeleteInvoice']);
Route::get('/edit/{id}', [Add_Invoice_controlle::class, 'EditInvoice']);
Route::get('/ViewInvoices/{id}', [Add_Invoice_controlle::class, 'ViewInvoice']); //OK
Route::get('/download_invoice/{id}', [Add_Invoice_controlle::class, 'DownloadInvoice']);
Route::get('/trashed_users', [Add_Invoice_controlle::class, 'TrashedCustomers']); //OK
Route::get('/trash_restore/{id}', [Add_Invoice_controlle::class, 'RestoreTrashedUsers']);
Route::get('/trash_remove/{id}', [Add_Invoice_controlle::class, 'RemoveTrashedUsers']);
Route::get('/get_add_invoice_data', [Add_Invoice_controlle::class, 'AddInvoice']);




Route::post('/add_invoice_data', [Add_Invoice_controlle::class, 'AddInvoice']); //ok
Route::post('/Send-Messages', [SendWhatsAppMessageController::class, 'SendFormMessage']);
Route::post('/invoice-submit', [Invoice_Controller::class, 'Invoicefunction']);
Route::post('QR_generater', [QRcodeGenerater::class, 'QRGenerate']);
Route::post('/user_check', [Add_Invoice_controlle::class, 'Phone']);



Route::put('final_edit/{id}', [Add_Invoice_controlle::class, 'FinalEdit']);

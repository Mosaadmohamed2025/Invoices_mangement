<?php

use App\Http\Controllers\Customers_Report;
use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\Invoices_Report;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\InvoicesDetails;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProductsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();


Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Routes For Invoices
    Route::get('invoices' , [InvoicesController::class , 'index']);
    Route::get('invoices/create' , [InvoicesController::class , 'create'])->name('create');
    Route::post('invoices/store' , [InvoicesController::class , 'store'])->name('invoices.store');
    Route::post('invoices/update' , [InvoicesController::class , 'update'])->name('invoices.update');
    Route::get('section/{id}',[InvoicesController::class , 'getproducts']);
    Route::get('Status_show/{id}',[InvoicesController::class , 'show'])->name('Status_show');
    Route::get('/InvoicesDetails/{id}', [InvoicesDetails::class , 'edit']);
    Route::post('/Status_Update/{id}', [InvoicesController::class,'Status_Update'])->name('Status_Update');
    Route::post('/invoices/delete', [InvoicesController::class,'destroy'])->name('invoices.destroy');
    Route::get('Archive', [InvoiceAchiveController::class , 'index']);
    Route::get('Print_invoice/{id}',[InvoicesController::class , 'Print_invoice']);
    Route::post('Archive/update',[InvoiceAchiveController::class , 'update'])->name('Archive.update');
    Route::post('Archive/delete',[InvoiceAchiveController::class , 'destroy'])->name('Archive.destroy');
    Route::post('delete_file', [InvoicesDetails::class , 'destroy'])->name('delete_file');
    Route::get('/edit_invoice/{id}', [InvoicesController::class,'edit']);
    Route::get('Invoice_Paid',[InvoicesController::class,'Invoice_Paid']);
    Route::get('Invoice_UnPaid',[InvoicesController::class,'Invoice_UnPaid']);
    Route::get('Invoice_Partial',[InvoicesController::class,'Invoice_Partial']);
    Route::get('export_invoices', [InvoicesController::class , 'export']);
    Route::get('download/{invoice_number}/{file_name}', [InvoicesDetails::class,'get_file']);
    Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetails::class,'open_file']);
    Route::post('delete_file', [InvoicesDetails::class,'destroy'])->name('delete_file');



   //Routes For Reports
    Route::get('invoices_report', [Invoices_Report::class , 'index']);

    Route::post('Search_invoices', [Invoices_Report::class , 'Search_invoices']);

    Route::get('customers_report', [Customers_Report::class,'index'])->name("customers_report");

    Route::post('Search_customers', [Customers_Report::class,'Search_customers']);


     //Notifications
    Route::get('MarkAsRead_all',[InvoicesController::class,'MarkAsRead_all'])->name('MarkAsRead_all');

    Route::get('unreadNotifications_count', [InvoicesController::class,'unreadNotifications_count'])->name('unreadNotifications_count');

    Route::get('unreadNotifications', [InvoicesController::class,'unreadNotifications'])->name('unreadNotifications');


    Route::post('InvoiceAttachments', [InvoiceAttachmentsController::class , 'store'])->name('InvoiceAttachments');



    //Routes For Sections
    Route::get('sections' , [SectionController::class , 'index']);
    Route::post('/sections/add' , [SectionController::class , 'store'])->name('sections.store');
    Route::post('/sections/update' , [SectionController::class , 'update'])->name('sections.update');
    Route::post('/sections/destroy' , [SectionController::class , 'destroy'])->name('sections.destroy');

    Route::get('/roles' , [\App\Http\Controllers\RoleController::class , 'index']);
    Route::get('/users' , [\App\Http\Controllers\UserController::class , 'index']);


    //Routes For Products
    Route::get('products' , [ProductsController::class , 'index']);
    Route::post('/products/add' , [ProductsController::class , 'store'])->name('products.store');
    Route::post('/products/update' , [ProductsController::class , 'update'])->name('products.update');
    Route::post('/products/destroy' , [ProductsController::class , 'destroy'])->name('products.destroy');


    Route::get('/{page}', [AdminController::class , 'index']);


    Route::resource('roles', \App\Http\Controllers\RoleController::class)->middleware('auth');
    Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');

});

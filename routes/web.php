<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\Auth\loginController;



use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserGroupsController;

use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserReportsController;

use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\ProductsStockController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\Auth\RegisteredController;


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Reports\DayReportsController;
use App\Http\Controllers\Reports\SaleReportController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Reports\ReceiptReportController;
use App\Http\Controllers\Reports\PaymentsReportController;
use App\Http\Controllers\Reports\PurchaseReportController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('login',                                             [loginController::class, 'login'])->name('login');
Route::post('login',                                            [loginController::class, 'authenticate'])->name('login.confirm');

Route::get('register',                                          [RegisteredController::class, 'index'])->name('register');
Route::post('custom-registration',                              [RegisteredController::class, 'customRegistration'])->name('register.custom');
Route::get('signout',                                           [RegisteredController::class, 'signOut'])->name('signout');

Route::get('forget-password',                                   [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('forget-password',                                  [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password');
Route::get('reset-password/{token}',                            [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password',                                   [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::group(['middleware' => 'prevent-back-history'], function () {
  Route::group(['middleware' => 'auth'], function () {
    // Auth::routes();

    Route::get('/',                                              [DashboardController::class, 'index']);
    Route::get('dashboard',                                      [DashboardController::class, 'index']);

    Route::get('logout',                                         [loginController::class, 'logout'])->name('logout');

    Route::get('profile',                                        [UserProfileController::class, 'index'])->name('profile.show');
    Route::get('profile/edit',                                   [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update',                                [UserProfileController::class, 'store'])->name('profile.update');


    Route::get('change-password',                                [ChangePasswordController::class, 'index']);
    Route::post('change-password',                               [ChangePasswordController::class, 'store'])->name('change.password');

    Route::get('groups',                                         [UserGroupsController::class, 'index']);
    Route::get('groups/create',                                  [UserGroupsController::class, 'create']);
    Route::post('groups',                                        [UserGroupsController::class, 'store']);
    Route::delete('groups/{id}',                                 [UserGroupsController::class, 'destroy']);


    Route::resource('users',                                     UsersController::class);

    Route::get('users/{id}/sales',                               [UserSalesController::class, 'index'])->name('user.sales');

    Route::get('users/{id}/reports',                             [UserReportsController::class, 'reports'])->name('user.reports');

    Route::post('users/{id}/invoices',                           [UserSalesController::class, 'createInvoice'])->name('user.sales.store');
    Route::get('users/{id}/invoices/{invoice_id}',               [UserSalesController::class, 'invoice'])->name('user.sales.invoice_details');
    Route::delete('users/{id}/invoices/{invoice_id}',            [UserSalesController::class, 'destroy'])->name('user.sales.destroy');
    Route::post('users/{id}/invoices/{invoice_id}',              [UserSalesController::class, 'addItem'])->name('user.sales.invoices.add_item');
    Route::delete('users/{id}/invoices/{invoice_id}/{item_id}',  [UserSalesController::class, 'destroyItem'])->name('user.sales.invoices.delete_item');

    //Route for purchases
    Route::get('users/{id}/purchases',                           [UserPurchasesController::class, 'index'])->name('user.purchases');
    Route::post('users/{id}/purchases',                          [UserPurchasesController::class, 'createInvoice'])->name('user.purchases.store');
    Route::get('users/{id}/purchases/{invoice_id}',              [UserPurchasesController::class, 'invoice'])->name('user.purchases.invoice_details');
    Route::delete('users/{id}/purchases/{invoice_id}',           [UserPurchasesController::class, 'destroy'])->name('user.purchases.destroy');
    Route::post('users/{id}/purchases/{invoice_id}',             [UserPurchasesController::class, 'addItem'])->name('user.purchases.add_item');
    Route::delete('users/{id}/purchases/{invoice_id}/{item_id}', [UserPurchasesController::class, 'destroyItem'])->name('user.purchases.delete_item');

    Route::get('users/{id}/receipts',                            [UserReceiptsController::class, 'index'])->name('user.receipts');
    Route::post('users/{id}/receipts/{invoice_id?}',             [UserReceiptsController::class, 'store'])->name('user.receipts.store');
    Route::delete('users/{id}/receipts/{receipt_id}',            [UserReceiptsController::class, 'destroy'])->name('user.receipts.destroy');


    Route::get('users/{id}/payments',                            [UserPaymentsController::class, 'index'])->name('user.payments');
    Route::post('users/{id}/payments/{invoice_id?}',             [UserPaymentsController::class, 'store'])->name('user.payments.store');
    Route::delete('users/{id}/payments/{payment_id}',            [UserPaymentsController::class, 'destroy'])->name('user.payments.destroy');



    Route::resource('categories', CategoriesController::class, ['except' => ['show']]);

    Route::resource('products', ProductsController::class);
    Route::get('stocks',                                        [ProductsStockController::class, 'index'])->name('stocks');

    Route::get('reports/sales',                                 [SaleReportController::class, 'index'])->name('reports.sales');
    Route::get('reports/purchases',                             [PurchaseReportController::class, 'index'])->name('reports.purchases');
    Route::get('reports/payments',                              [PaymentsReportController::class, 'index'])->name('reports.payments');
    Route::get('reports/receipts',                              [ReceiptReportController::class, 'index'])->name('reports.receipts');
    Route::get('reports/days',                                  [DayReportsController::class, 'index'])->name('reports.days');

    // Route::get('generate-pdf', [PdfController::class, 'generate_pdf']);
    Route::get('download-pdf', [PdfController::class, 'downloadPdf'])->name('download-pdf');
  });
});

// Route::get('users/{id}',[UsersController::class, 'show']);
// Route::get('users/create',[UsersController::class, 'create']);
// Route::post('users',[UsersController::class, 'store']);
// Route::get('users/{id}/edit',[UsersController::class, 'edit']);
// Route::put('users/{id}',[UsersController::class, 'update']);
// Route::delete('users/{id}',[UsersController::class, 'destroy']);
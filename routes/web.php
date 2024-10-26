<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\AccountController;
use App\Http\Controllers\Client\ClientAppointmentController;
use App\Http\Controllers\Client\ClientReportController;
use App\Http\Controllers\Client\CompanyController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ServiceController;
use App\Http\Controllers\Client\CustomerController;
use App\Http\Controllers\Client\ProductOrderController;
use App\Http\Controllers\Client\SubscriptionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('subscribed');

Route::middleware('auth:web')->group( function () {
    Route::prefix('client')->group( function () {
        
        Route::prefix('settings')->group( function () {
            Route::resource('subscription', SubscriptionController::class);
            Route::resource('account', AccountController::class)->middleware('subscribed');
            Route::resource('users', UserController::class);
            Route::resource('company', CompanyController::class);
        });

        Route::resource('products', ProductController::class)->middleware('subscribed');
        Route::resource('services', ServiceController::class)->middleware('subscribed');
        Route::resource('customers', CustomerController::class)->middleware('subscribed');
        Route::resource('orders', ProductOrderController::class)->middleware('subscribed');
        Route::resource('appointments', ClientAppointmentController::class)->middleware('subscribed');

        Route::get('reports/customers', [ClientReportController::class, 'customers']);
        Route::get('reports/appointments', [ClientReportController::class, 'appointments']);
        Route::get('reports/sales', [ClientReportController::class, 'sales']);

    });

    require __DIR__.'/customer-routes.php';
    require __DIR__.'/admin-routes.php';
});

Route::get('products/{name}', [SiteController::class, 'product_details']);
Route::get('products', [SiteController::class, 'products']);
Route::get('services', [SiteController::class, 'services']);
Route::get('shops', [SiteController::class, 'shops']);

Route::get('cart', [SiteController::class, 'cart']);
Route::delete('cart/{rowId}', [SiteController::class, 'deleteCartItem']);
Route::post('cart', [SiteController::class, 'storeCart']);

Route::post('checkout', [SiteController::class, 'storeCheckout']);
Route::get('checkout', [SiteController::class, 'checkout']);

Route::resource('appointment', AppointmentController::class);
<?php

use App\Http\Controllers\Client\AccountController;
use App\Http\Controllers\Client\CompanyController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\SubscriptionController;
use App\Http\Controllers\Client\UserController;

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

        Route::resource('products', ProductController::class);
        Route::resource('services', ServiceController::class);

    });
});
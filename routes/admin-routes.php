<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group( function() {
    Route::resource('clients', ClientController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', AdminUserController::class);

    Route::get('reports/customers', [ReportController::class, 'customers']);
    Route::get('reports/subscriptions', [ReportController::class, 'subscriptions']);
});
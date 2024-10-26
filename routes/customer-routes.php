<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerUserController;

Route::get('dashboard', [CustomerUserController::class, 'dashboard']);
Route::prefix('customer')->group( function () {
    Route::resource('orders', CustomerUserController::class);
});
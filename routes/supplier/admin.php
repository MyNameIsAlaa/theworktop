<?php

use App\Http\Controllers\Backend\Supplier\SupplierController;
use App\Http\Controllers\Backend\Supplier\DashboardController;

/*
 * All route names are prefixed with 'supplier.'.
 */

Route::redirect('/', '/supplier/login', 301);
Route::get('login', [SupplierController::class, 'create']);
Route::post('login', [SupplierController::class, 'login']);

Route::get('signup', [SupplierController::class, 'create']);
Route::post('signup', [SupplierController::class, 'store']);



Route::group(['middleware' => 'role:supplier'], function () {
    Route::get('dashboard', [DashboardController::class, 'Index'])->name('dashboard');
    Route::get('quotes', [DashboardController::class, 'Quotes'])->name('quotes');
    Route::get('quotes/{id}', [DashboardController::class, 'ViewQuote'])->name('viewQuote');
});


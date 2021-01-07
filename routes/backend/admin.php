<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminWholesaleController;
use App\Http\Controllers\Backend\AdminCatalogController;
use App\Http\Controllers\Backend\AdminSlobsController;

/*
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::group([
    'prefix' => 'wholesalers',
    'as' => 'wholesalers.',
], function () {

    Route::get('/', [AdminWholesaleController::class, 'index'])->name('index');
    Route::get('/create', [AdminWholesaleController::class, 'create'])->name('create');
    Route::post('/create', [AdminWholesaleController::class, 'store']);
    Route::get('/edit/{id}', [AdminWholesaleController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [AdminWholesaleController::class, 'update']);
    Route::get('/delete/{id}', [AdminWholesaleController::class, 'destroy']);
});

Route::group([
    'prefix' => 'catalogs',
    'as' => 'catalogs.',
], function () {

    Route::get('/', [AdminCatalogController::class, 'index'])->name('index');
    Route::get('/create', [AdminCatalogController::class, 'create'])->name('create');
    Route::post('/create', [AdminCatalogController::class, 'store']);
    Route::get('/edit/{id}', [AdminCatalogController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [AdminCatalogController::class, 'update']);
    Route::get('/delete/{id}', [AdminCatalogController::class, 'destroy']);
});

Route::group([
    'prefix' => 'slobs',
    'as' => 'slobs.',
], function () {
    Route::get('/{category}', [AdminSlobsController::class, 'indexByCatalog'])->name('index');
    Route::get('/delete/{id}', [AdminSlobsController::class, 'destroy']);

});


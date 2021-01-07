<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CatalogController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('quotepage', [HomeController::class, 'QuoteForm'])->name('QuotePage');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::post('pricing/quote/create', [QuoteController::class, 'store']);
Route::get('quotepage/catalogs', [CatalogController::class, 'ajaxIndex']);

Route::get('catalogs', [CatalogController::class, 'Index'])->name('CatalogsPage');
Route::get('catalog/{id}', [CatalogController::class, 'show']);


Route::post('addtocart', [CatalogController::class, 'AddCatalogToQuote']);
Route::post('removefromcart', [CatalogController::class, 'RemoveCatalogFromCart']);
Route::post('addmaterial', [CatalogController::class, 'SelectMaterial']);
Route::post('removematerial', [CatalogController::class, 'RemoveMaterial']);

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('favorites', [DashboardController::class, 'favorites'])->name('favorites');
        Route::get('delete_favorite/{id}', [DashboardController::class, 'Delete_Favorites'])->name('Delete_Favorites');

        /*
         * User Account Specific
         */
        Route::get('account', [AccountController::class, 'index'])->name('account');
        Route::post('addcatalog', [AccountController::class, 'add_catalog']);
        /*
         * User Profile Specific
         */
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});

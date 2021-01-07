<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MaterialController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('quotes', [QuoteController::class, 'Index']);
Route::get('quotes/{id}', [QuoteController::class, 'show']);

Route::get('materials', [MaterialController::class, 'Index']);
Route::get('materials/{id}', [MaterialController::class, 'Show']);

Route::get('catalogs', [CatalogController::class, 'Index']);

//Route::post('submitquote', [QuoteController::class, 'SubmitQuote']);

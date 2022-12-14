<?php

use App\Http\Controllers\Catalog;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Catalog\IndexController::class);

Route::group(["prefix" => "catalog"], function () {
    Route::get('/{brand}', Catalog\BrandController::class)->name("catalog.brand");
    Route::get('/{brand}/{model}', Catalog\ModelController::class)->name("catalog.model");
});

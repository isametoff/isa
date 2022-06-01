<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Main\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;

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

Route::name('main.')->group(function () {
    Route::get('/', IndexController::class);
});

Route::prefix('admin')->group(function () {
    Route::name('main')->group(function () {
        Route::get('/', AdminController::class);
    });
    Route::name('category')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('/', CategoryController::class);
        });
    });
});

Auth::routes();

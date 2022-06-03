<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Main\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\UpdateController;
use App\Http\Controllers\Admin\Category\DeleteController;
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

Route::name('admin.')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('main')->group(function () {
            Route::get('/', AdminController::class);
        });
        Route::name('category.')->group(function () {
            Route::prefix('category')->group(function () {
                Route::get('/', CategoryController::class)->name('index');
                Route::get('/create', CreateController::class)->name('create');
                Route::post('/store', StoreController::class)->name('store');
                Route::get('/{category}', ShowController::class)->name('show');
                Route::get('/{category}/edit', EditController::class)->name('edit');
                Route::patch('/{category}', UpdateController::class)->name('update');
                Route::delete('/{category}', DeleteController::class)->name('delete');
            });
        });
        Route::name('tag.')->group(function () {
            Route::prefix('tag')->group(function () {
                Route::get('/', App\Http\Controllers\Admin\Tag\TagController::class)->name('index');
                Route::get('/create', App\Http\Controllers\Admin\Tag\CreateController::class)->name('create');
                Route::post('/store', App\Http\Controllers\Admin\Tag\StoreController::class)->name('store');
                Route::get('/{tag}', App\Http\Controllers\Admin\Tag\ShowController::class)->name('show');
                Route::get('/{tag}/edit', App\Http\Controllers\Admin\Tag\EditController::class)->name('edit');
                Route::patch('/{tag}', App\Http\Controllers\Admin\Tag\UpdateController::class)->name('update');
                Route::delete('/{tag}', App\Http\Controllers\Admin\Tag\DeleteController::class)->name('delete');
            });
        });
    });
});

Auth::routes();

<?php

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
use App\Http\Controllers\Personal\Comment\CommentController;
use App\Http\Controllers\Personal\Liked\LikedController;
use App\Http\Controllers\Personal\Main\PersonalController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('main.')->group(function () {
    Route::get('/', IndexController::class);
});

Route::name('personal.')->prefix('personal')->middleware('admin')->group(function () {
    Route::get('/', PersonalController::class)->name('index');
    Route::name('main.')->prefix('main')->group(function () {
        Route::get('/', PersonalController::class)->name('index');
    });
    Route::name('liked.')->prefix('liked')->group(function () {
        Route::get('/', LikedController::class)->name('index');
    });
    Route::name('comment.')->prefix('comment')->group(function () {
        Route::get('/', CommentController::class)->name('index');
    });
});
Route::name('admin.')->prefix('admin')->middleware('auth', 'verified', 'admin')->group(function () {
    Route::get('/', AdminController::class)->name('index');
    Route::name('main.')->prefix('main')->group(function () {
        Route::get('/', AdminController::class)->name('index');
    });
    Route::name('post.')->prefix('post')->middleware('verified', 'admin')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\Post\PostController::class)->name('index');
        Route::get('/create', App\Http\Controllers\Admin\Post\CreateController::class)->name('create');
        Route::post('/store', App\Http\Controllers\Admin\Post\StoreController::class)->name('store');
        Route::get('/{post}', App\Http\Controllers\Admin\Post\ShowController::class)->name('show');
        Route::get('/{post}/edit', App\Http\Controllers\Admin\Post\EditController::class)->name('edit');
        Route::patch('/{post}', App\Http\Controllers\Admin\Post\UpdateController::class)->name('update');
        Route::delete('/{post}', App\Http\Controllers\Admin\Post\DeleteController::class)->name('delete');
    });
    Route::name('category.')->prefix('category')->group(function () {
        Route::get('/', CategoryController::class)->name('index');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/store', StoreController::class)->name('store');
        Route::get('/{category}', ShowController::class)->name('show');
        Route::get('/{category}/edit', EditController::class)->name('edit');
        Route::patch('/{category}', UpdateController::class)->name('update');
        Route::delete('/{category}', DeleteController::class)->name('delete');
    });
    Route::name('tag.')->prefix('tag')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\Tag\TagController::class)->name('index');
        Route::get('/create', App\Http\Controllers\Admin\Tag\CreateController::class)->name('create');
        Route::post('/store', App\Http\Controllers\Admin\Tag\StoreController::class)->name('store');
        Route::get('/{tag}', App\Http\Controllers\Admin\Tag\ShowController::class)->name('show');
        Route::get('/{tag}/edit', App\Http\Controllers\Admin\Tag\EditController::class)->name('edit');
        Route::patch('/{tag}', App\Http\Controllers\Admin\Tag\UpdateController::class)->name('update');
        Route::delete('/{tag}', App\Http\Controllers\Admin\Tag\DeleteController::class)->name('delete');
    });
    Route::name('user.')->prefix('user')->group(function () {
        Route::get('/', App\Http\Controllers\Admin\User\UserController::class)->name('index');
        Route::get('/create', App\Http\Controllers\Admin\User\CreateController::class)->name('create');
        Route::post('/store', App\Http\Controllers\Admin\User\StoreController::class)->name('store');
        Route::get('/{user}', App\Http\Controllers\Admin\User\ShowController::class)->name('show');
        Route::get('/{user}/edit', App\Http\Controllers\Admin\User\EditController::class)->name('edit');
        Route::patch('/{user}', App\Http\Controllers\Admin\User\UpdateController::class)->name('update');
        Route::delete('/{user}', App\Http\Controllers\Admin\User\DeleteController::class)->name('delete');
    });
});

Auth::routes(['verify' => true]);

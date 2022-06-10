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

Route::name('admin.')->prefix('admin')->group(function () {
    Route::middleware(['auth', 'admin', 'verified'])->group(function () {
        Route::get('/', AdminController::class)->name('index');
        Route::name('main.')->group(function () {
            Route::prefix('main')->group(function () {
                Route::get('/', AdminController::class)->name('index');
            });
        });
        Route::name('post.')->group(function () {
            Route::prefix('post')->group(function () {
                Route::get('/', App\Http\Controllers\Admin\Post\PostController::class)->name('index');
                Route::get('/create', App\Http\Controllers\Admin\Post\CreateController::class)->name('create');
                Route::post('/store', App\Http\Controllers\Admin\Post\StoreController::class)->name('store');
                Route::get('/{post}', App\Http\Controllers\Admin\Post\ShowController::class)->name('show');
                Route::get('/{post}/edit', App\Http\Controllers\Admin\Post\EditController::class)->name('edit');
                Route::patch('/{post}', App\Http\Controllers\Admin\Post\UpdateController::class)->name('update');
                Route::delete('/{post}', App\Http\Controllers\Admin\Post\DeleteController::class)->name('delete');
            });
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
        Route::name('user.')->group(function () {
            Route::prefix('user')->group(function () {
                Route::get('/', App\Http\Controllers\Admin\User\UserController::class)->name('index');
                Route::get('/create', App\Http\Controllers\Admin\User\CreateController::class)->name('create');
                Route::post('/store', App\Http\Controllers\Admin\User\StoreController::class)->name('store');
                Route::get('/{user}', App\Http\Controllers\Admin\User\ShowController::class)->name('show');
                Route::get('/{user}/edit', App\Http\Controllers\Admin\User\EditController::class)->name('edit');
                Route::patch('/{user}', App\Http\Controllers\Admin\User\UpdateController::class)->name('update');
                Route::delete('/{user}', App\Http\Controllers\Admin\User\DeleteController::class)->name('delete');
            });
        });
    });
});

Auth::routes(['verify' => true]);
// Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
//     Route::get('/', [AdminController::class])->name('admin.main.index');
//     Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
//         Route::get('/', [AdminController::class, 'index'])->name('admin.main.index');
//     });

//     Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
//         Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
//         Route::get('/create', [CreateController::class, 'create'])->name('admin.post.create');
//         Route::post('/', [StoreController::class, '__invoke'])->name('admin.post.store');
//         Route::get('/{post}', [ShowController::class, '__invoke'])->name('admin.post.show');
//         Route::get('/{post}/edit', [EditController::class, '__invoke'])->name('admin.post.edit');
//         Route::patch('/{post}', [UpdateController::class, '__invoke'])->name('admin.post.update');
//         Route::delete('/{post}', [DeleteController::class, '__invoke'])->name('admin.post.delete');
//     });

//     Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
//         Route::get('/', [CategoryController::class, '__invoke'])->name('admin.category.index');
//         Route::get('/create', [CreateController::class, '__invoke'])->name('admin.category.create');
//         Route::post('/', [StoreController::class, '__invoke'])->name('admin.category.store');
//         Route::get('/{category}', [ShowController::class, '__invoke'])->name('admin.category.show');
//         Route::get('/{category}/edit', [EditController::class, '__invoke'])->name('admin.category.edit');
//         Route::patch('/{category}', [UpdateController::class, '__invoke'])->name('admin.category.update');
//         Route::delete('/{category}', [DeleteController::class, '__invoke'])->name('admin.category.delete');
//     });


//     Route::group(['namespace' => 'Tag', 'prefix' => 'tagg'], function () {
//         Route::get('/', [TagController::class, '__invoke'])->name('admin.tag.index');
//         Route::get('/create', [CreateController::class, '__invoke'])->name('admin.tag.create');
//         Route::post('/', [StoreController::class, '__invoke'])->name('admin.tag.store');
//         Route::get('/{tag}', [ShowController::class, '__invoke'])->name('admin.tag.show');
//         Route::get('/{tag}/edit', [EditController::class, '__invoke'])->name('admin.tag.edit');
//         Route::patch('/{tag}', [UpdateController::class, '__invoke'])->name('admin.tag.update');
//         Route::delete('/{tag}', [DeleteController::class, '__invoke'])->name('admin.tag.delete');
//     });


//     Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
//         Route::get('/', [UserController::class, '__invoke'])->name('admin.user.index');
//         Route::get('/create', [CreateController::class, '__invoke'])->name('admin.user.create');
//         Route::post('/', [StoreController::class, '__invoke'])->name('admin.user.store');
//         Route::get('/{user}', [ShowController::class, '__invoke'])->name('admin.user.show');
//         Route::get('/{user}/edit', [EditController::class, '__invoke'])->name('admin.user.edit');
//         Route::patch('/{user}', [UpdateController::class, '__invoke'])->name('admin.user.update');
//         Route::delete('/{user}', [DeleteController::class, '__invoke'])->name('admin.user.delete');
//     });
// });

// Auth::routes(['verify' => true]);

<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductsController;
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

Route::get('/', LandingPageController::class)->name('index');
Route::get('/products/{name}/{id}', [ProductsController::class, 'show'])->name('product.show');
Route::get('/categories/{category:name}', [CategoriesController::class, 'show'])->name('categories.show');

Route::redirect('/dashboard', '/admin');

// admin
Route::prefix('admin')->middleware(['auth', 'permission:admin access'])->group(function () {
    // dashboard
    Route::view('/', 'layouts.adminlte')->name('admin.index');

    // products
    Route::get('/products', [ProductsController::class, 'adminProductsIndex'])->name('admin.products.index');
    Route::post('/products', [ProductsController::class, 'adminProductsStore'])->name('admin.products.store');
    Route::get('/products/create', [ProductsController::class, 'adminProductsCreate'])->name('admin.products.create');
    Route::get('/products/{id}/edit', [ProductsController::class, 'adminProductsEdit'])->name('admin.products.edit');
    Route::get('/products/{id}/photos-manager', [ProductsController::class, 'adminProductsPhotosManager'])->name('admin.products.photosManager');
    Route::post('/products/{id}/photos-manager', [ProductsController::class, 'adminProductsPhotosManagerStore'])->name('admin.products.photosManagerStore');
    Route::delete('/products/{productId}/photos-manager/{imageId}', [ProductsController::class, 'adminProductsPhotosManagerDelete'])->name('admin.products.photosManagerDelete');
    Route::patch('/products/{id}', [ProductsController::class, 'adminProductsUpdate'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductsController::class, 'adminProductsDelete'])->name('admin.products.delete');

    // categories
    Route::get('/categories', [CategoriesController::class, 'adminCategoriesIndex'])->name('admin.categories.index');

    // banners
    Route::name('admin.')->group(function () {
        Route::resource('/banners', BannerController::class);
    });

    // mass delete
    Route::delete('/mass-delete/products', [ProductsController::class, 'adminProductsDeleteSelected'])->name('admin.products.deleteSelected');
    Route::delete('/mass-delete/banners', [BannerController::class, 'massDelete'])->name('admin.banners.massdelete');
});

require __DIR__ . '/auth.php';

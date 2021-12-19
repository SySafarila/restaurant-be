<?php

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
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('product.show');
Route::get('/categories/{category:name}', [CategoriesController::class, 'show'])->name('categories.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// admin
Route::prefix('admin')->middleware(['permission:admin access'])->group(function () {
    Route::get('/products', [ProductsController::class, 'adminProductsIndex'])->name('admin.products.index');
    Route::get('/categories', [CategoriesController::class, 'adminCategoriesIndex'])->name('admin.categories.index');
});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::match(['put', 'patch'], '/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::resource('stores', StoreController::class);

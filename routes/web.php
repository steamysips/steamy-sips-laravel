<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;


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

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name(name: 'products.destroy');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::resource('stores', StoreController::class);

Route::get('products/{productId}/reviews', [ReviewController::class, 'index'])->name('reviews.index');

// Route for creating a review
Route::get('products/{productId}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');

// Route for storing a review
Route::post('products/{productId}/reviews', [ReviewController::class, 'store'])->name('reviews_store');

// Route for editing a review
Route::get('products/{productId}/reviews/{reviewId}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');

// Route for updating a review
Route::put('products/{productId}/reviews/{reviewId}', [ReviewController::class, 'update'])->name('reviews.update');

// Route for deleting a review
Route::delete('products/{productId}/reviews/{reviewId}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

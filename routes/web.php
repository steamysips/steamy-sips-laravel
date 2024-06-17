<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


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

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ClientController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ClientController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ClientController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ClientController::class, 'destroy'])->name('profile.destroy');
});

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Order Routes
Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

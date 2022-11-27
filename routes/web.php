<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [ProductController::class, 'index'])->middleware(['auth','verified'])->name('dashboard');
Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');

// カート
Route::post('addcart', [CartController::class, 'index'])->name('cart');
Route::get('cart', [CartController::class, 'cartlist'])->name('cartlist');
Route::get('removecart/{id}', [CartController::class, 'destroy'])->name('removecart');

// 注文
Route::get('order', [OrderController::class, 'index'])->name('order');
Route::post('order_detail', [OrderController::class, 'store'])->name('order.store');


require __DIR__.'/auth.php';

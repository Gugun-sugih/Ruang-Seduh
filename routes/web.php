<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\CartController;

Route::view('/', 'pages.tentang');

Route::get('/menu', [MenuController::class, 'index']);
Route::get('/toko', [TokoController::class, 'index']);
Route::get('/pesan', [PesanController::class, 'index']);

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/increase', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout/pay', [CartController::class, 'pay'])->name('checkout.pay');

Route::get('/struk', [CartController::class, 'struk'])->name('checkout.struk');

use App\Http\Controllers\KontakController;

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.submit');


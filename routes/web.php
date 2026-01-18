<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminOrderController;

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\AdminMessageController;

/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTES (NO LOGIN)
|--------------------------------------------------------------------------
*/
Route::view('/', 'pages.tentang');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/toko', [TokoController::class, 'index'])->name('toko');
Route::get('/pesan', [PesanController::class, 'index'])->name('pesan');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/increase', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/note', [CartController::class, 'updateNote'])->name('cart.note');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// ✅ 1) GET checkout = tampilkan keranjang
Route::get('/checkout', [CartController::class, 'checkoutPage'])->name('checkout');

// ✅ 2) POST checkout = pindah ke pembayaran
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout.submit');

// ✅ 3) POST pay = simpan order + struk
Route::post('/checkout/pay', [CartController::class, 'pay'])->name('checkout.pay');

Route::get('/struk/{id}', [CartController::class, 'struk'])->name('checkout.struk');

// kontak (view + submit)
Route::view('/kontak', 'pages.kontak')->name('kontak');
Route::post('/kontak', [ContactMessageController::class, 'store'])->name('kontak.submit');


/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // ✅ menu management
    Route::get('/admin/menu', [AdminMenuController::class, 'index'])->name('admin.menu.index');
    Route::get('/admin/menu/create', [AdminMenuController::class, 'create'])->name('admin.menu.create');
    Route::post('/admin/menu', [AdminMenuController::class, 'store'])->name('admin.menu.store');
    Route::get('/admin/menu/{id}/edit', [AdminMenuController::class, 'edit'])->name('admin.menu.edit');
    Route::put('/admin/menu/{id}', [AdminMenuController::class, 'update'])->name('admin.menu.update');
    Route::delete('/admin/menu/{id}', [AdminMenuController::class, 'destroy'])->name('admin.menu.destroy');

    // ✅ order management
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/admin/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');

    // ✅ customer messages
    Route::get('/admin/messages', [AdminMessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/admin/messages/{id}', [AdminMessageController::class, 'show'])->name('admin.messages.show');

});

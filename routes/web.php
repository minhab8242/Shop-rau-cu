<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

// Trang chủ - Danh sách sản phẩm
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/san-pham/{id}', [ProductController::class, 'show'])->name('product.show');

// Giỏ hàng
Route::post('/gio-hang/them', [CartController::class, 'add'])->name('cart.add');
Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');
Route::delete('/gio-hang/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Đặt hàng
Route::get('/dat-hang', function() {
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect('/')->with('error', 'Giỏ hàng trống!');
    }
    return view('orders.checkout');
})->name('order.checkout');

Route::post('/dat-hang', [OrderController::class, 'store'])->name('order.store');
Route::get('/dat-hang/thanh-cong/{id}', [OrderController::class, 'success'])->name('order.success');

// Authentication routes (từ Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
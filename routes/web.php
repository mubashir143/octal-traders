<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $products = \App\Models\Product::latest()->take(10)->get();
    return view('index', compact('products'));
})->name('home');

// Shop Routes
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/add-to-cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');

// Order Routes
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/inventory', [DashboardController::class, 'inventory'])->name('inventory');
    Route::get('/products/create', [DashboardController::class, 'create'])->name('products.create');
    Route::post('/products/store', [DashboardController::class, 'store'])->name('products.store');

    // Admin Order Management
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.update-status');
});

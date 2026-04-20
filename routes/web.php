<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    $products = Product::latest()->take(10)->get();
    $categories = Category::all();
    $categoriesWithProducts = Category::whereHas('products')
        ->with(['products' => function ($query) {
            $query->latest()->take(4);
        }])->get();
    $banners = Banner::where('status', true)->orderBy('order')->get();

    return view('index', compact('products', 'categories', 'categoriesWithProducts', 'banners'));
})->name('home');

// Shop Routes
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/add-to-cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/buy-now/{product}', [CartController::class, 'buy'])->name('cart.buy');
Route::patch('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');

// Order Routes
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');

// Admin Auth Routes (no middleware — public)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});

// Admin Routes (protected)
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/inventory', [DashboardController::class, 'inventory'])->name('inventory');
    Route::get('/products/create', [DashboardController::class, 'create'])->name('products.create');
    Route::post('/products/store', [DashboardController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [DashboardController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [DashboardController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [DashboardController::class, 'destroy'])->name('products.destroy');

    // Admin Order Management
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.update-status');

    // Admin Categories Management
    Route::resource('categories', AdminCategoryController::class);

    // Admin Users Management
    Route::resource('users', AdminUserController::class)->only(['index', 'edit', 'update']);

    // Admin Banner Management
    Route::resource('banners', BannerController::class);
});

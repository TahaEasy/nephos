<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('home');
})->middleware('no-admin')->name('home');

Route::get('/shop', [ProductController::class, 'shop'])->middleware('no-admin')->name('shop');

Route::prefix('cart')->middleware('no-admin')->group(function () {
    Route::post('/', [CartItemController::class, 'store']);
});

Route::prefix('order')->group(function () {
    Route::get('/{order:id}', [OrderController::class, 'show_order'])->name('order');
    Route::get('/{order:id}/invoice', [OrderController::class, 'show_invoice'])->name('invoice');
});

Route::prefix('products')->middleware('no-admin')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products');
    Route::get('/details/{product:slug}', [ProductController::class, 'show'])->name('product');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [UserController::class, 'login_page'])->name('login')->middleware('guest');
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/register', [UserController::class, 'regiser_page'])->name('register')->middleware('guest');
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
});

Route::prefix('dashboard')->middleware('auth', 'not-banned', 'no-admin')->group(function () {
    Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/edit', [UserController::class, 'edit'])->name('edit_account');
    Route::get('/wishlist', [UserController::class, 'wishlist_page'])->name('wishlist');

    Route::get('/cart', [UserController::class, 'cart_page'])->name('cart');
    Route::get('/cart/checkout', [UserController::class, 'checkout_page'])->name('checkout');
    Route::post('/cart/checkout', [OrderController::class, 'add_order'])->name('add_order');

    Route::get('/orders', [UserController::class, 'orders_page'])->name('orders');

    Route::middleware('seller')->group(function () {
        Route::get('/products', [UserController::class, 'create_product'])->name('create-product');
        Route::post('/products', [UserController::class, 'store_product'])->name('store-product');
        Route::get('/products/edit/{product:slug}', [UserController::class, 'edit_product'])->name('edit-product');
    });
});

Route::put('/products/edit/{slug}', [UserController::class, 'update_product'])->middleware('auth', 'not-banned')->name('update-product');

Route::prefix('admin')->middleware('auth', 'not-banned', 'admin')->group(function () {
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/comments', [AdminController::class, 'comments'])->name('admin.comments');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/products/{slug}', [AdminController::class, 'edit_products'])->name('admin.products.edit');
    Route::prefix('users')->group(function () {
        Route::get('{user:id}/details', [AdminController::class, 'user_dashboard'])->name('admin.user.dashboard');
        Route::get('{user:id}/edit', [AdminController::class, 'user_edit'])->name('admin.user.edit');
        Route::put('{user:id}/update', [AdminController::class, 'user_update'])->name('admin.user.update');
        Route::get('{user:id}/orders', [AdminController::class, 'user_orders'])->name('admin.user.orders');
        Route::get('{user:id}/comments', [AdminController::class, 'user_comments'])->name('admin.user.comments');
        Route::get('{user:id}/products', [AdminController::class, 'user_products'])->name('admin.user.products');
    });
});

Route::prefix('user')->middleware('auth', 'not-banned')->group(function () {
    Route::put('/edit', [UserController::class, 'update'])->name('edit-user');
});

Route::get('/avatars/{user:id}', [UserController::class, 'getAvatar'])->name('user-avatar');
Route::get('/product-images/{slug}', [ProductController::class, 'getImage'])->name('product-images');

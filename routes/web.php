<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('menu');
});

// Menu Route
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// Cart Routes
Route::get('/cart', [MenuController::class, 'cart'])->name('cart');
Route::post('/cart/add', [MenuController::class, 'addToCart'])->name('cart.add');
Route::post('cart/update', [MenuController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/clear', [MenuController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/remove', [MenuController::class, 'removeFromCart'])->name('cart.remove');

// Checkout Route
Route::get('/checkout', [MenuController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store', [MenuController::class, 'storeOrder'])->name('checkout.store');
Route::get('/checkout/success/{orderId}', [MenuController::class, 'checkoutSuccess'])->name('checkout.success');


// Admin Routes
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categorie.index');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::resource('admin/categories', CategoryController::class)->names('admin.categories');
Route::resource('admin/roles', RoleController::class)->names('admin.roles');
Route::resource('admin/items', ItemController::class)->names('admin.items');
Route::resource('admin/users', UserController::class)->names('admin.users');
Route::resource('admin/orders', OrderController::class)->names('admin.orders');

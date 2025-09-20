<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| All routes that require authentication are grouped using Jetstream middleware.
| The products page uses a Blade view with a Livewire component.
|
*/

// Public route (welcome page)
Route::get('/', function () {
    return view('welcome');
});

// Authenticated routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

 Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');        // View cart
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');       // Add item to cart
    Route::delete('/cart/remove/{index}', [CartController::class, 'remove'])->name('cart.remove'); // Remove item

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

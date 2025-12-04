<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about-us', [FrontendController::class, 'about_us'])->name('about.us');
Route::get('/products/search', [FrontendController::class, 'search'])->name('products.search');
Route::get('/products', [FrontendController::class, 'products'])->name('products');
Route::get('/product/{slug}', [FrontendController::class, 'product_details'])->name('product.details');
Route::get('/products/{slug}', [FrontendController::class, 'products_category'])->name('products.category');
Route::get('/contact-us', [FrontendController::class, 'contact_us'])->name('contact.us');
Route::post('/contact/store', [FrontendController::class, 'store'])->name('contact.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/order/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/order/show/{id}', [OrderController::class, 'show'])->name('orders.show');
});

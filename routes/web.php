<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomePageController::class, 'index'])->name('index');
Route::get('/addToCart', [HomePageController::class, 'addToCart'])->name('addToCart');
Route::get('/Cart', [HomePageController::class, 'Cart'])->name('Cart');
Route::get('/checkout', [HomePageController::class, 'checkout'])->name('checkout');
Route::get('/Order', [HomePageController::class, 'Order'])->name('Order');
Route::get('/shipping', [HomePageController::class, 'shipping'])->name('shipping');
Route::post('/shipping_address', [HomePageController::class, 'shipping_address'])->name('shipping_address');
Route::get('/currentshipping', [HomePageController::class, 'currentshipping'])->name('currentshipping');
Route::get('/about', [HomePageController::class, 'about'])->name('about');
Route::get('/privacy-policy', [HomePageController::class, 'privacy'])->name('privacy-policy');
Route::get('/faqs', [HomePageController::class, 'faqs'])->name('faqs');
Route::get('/sitemap', [HomePageController::class, 'sitemap'])->name('sitemap');
Route::get('/pendingorder', [AdminController::class, 'pendingorder'])->name('pendingorder');
Route::get('/completeorder', [AdminController::class, 'completeorder'])->name('completeorder');
Route::get('/confirmorder', [AdminController::class, 'confirmorder'])->name('confirmorder');
Route::get('/removecart', [HomePageController::class, 'removecart'])->name('removecart');
Route::get('/removeorder', [HomePageController::class, 'removeorder'])->name('removeorder');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



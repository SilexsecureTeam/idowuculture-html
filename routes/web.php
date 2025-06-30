<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [PagesController::class, 'index'])->name('index-page');

///pages controller
Route::get('/about', [PagesController::class, 'aboutus'])->name('about-page');
Route::get('/cart', [PagesController::class, 'cartpage'])->name('cart-page');
Route::get('/checkout', [PagesController::class, 'checkoutpage'])->name('checkout-page');
Route::get('/contact', [PagesController::class, 'contactus'])->name('contact-page');
Route::get('/privacy', [PagesController::class, 'privacy'])->name('privacy-page');
Route::get('/product', [PagesController::class, 'products'])->name('products-page');
Route::get('/term', [PagesController::class, 'term'])->name('term-page');
Route::get('/work', [PagesController::class, 'work'])->name('work-page');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

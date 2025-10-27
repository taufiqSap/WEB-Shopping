<?php

use App\Livewire\NewArrival;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Public routes
Route::get('/', fn() => view('welcome'));
Route::get('/about', fn() => view('pages.about'));
Route::get('/blog', fn() => view('pages.blog'));
Route::get('/new-arrivals', NewArrival::class)->name('new-arrivals');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

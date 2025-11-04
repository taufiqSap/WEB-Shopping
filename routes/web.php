<?php

use App\Livewire\NewArrival;
use App\Livewire\Shop;
use App\Livewire\Cart;
use App\Livewire\CreateOrder;
use App\Livewire\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;

// Public routes
Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/about', fn() => view('pages.about'))->name('about');
Route::get('/blog', Blog::class)->name('blog'); // HANYA 1x, hapus yang duplikat
Route::get('/new-arrivals', NewArrival::class)->name('new-arrivals');
Route::get('/shop', Shop::class)->name('shop');
Route::get('/cart', Cart::class)->name('cart');
Route::get('/checkout', CreateOrder::class)->name('checkout');
Route::get('/cart/count', function() {
    $cart = session()->get('cart', []);
    $count = 0;
    foreach ($cart as $item) {
        $count += $item['quantity'];
    }
    return response()->json(['count' => $count]);
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::resource('products', ProductController::class);
    Route::get('/products/{slug}', [ProductController::class, 'byCategory'])->name('products.byCategory');
    Route::resource('orders', OrderController::class);
    
   
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

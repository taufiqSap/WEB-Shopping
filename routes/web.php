<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\NewArrival;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});


Route::get('/redirect', function () {
    return redirect()->route('dashboard.index');
})->middleware(['auth'])->name('redirect');


Route::middleware(['auth', 'no-cache'])->group(function () {


    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Halaman publik
Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

Route::get('/new-arrivals', NewArrival::class)->name('new-arrivals');



// Auth routes
require __DIR__.'/auth.php';

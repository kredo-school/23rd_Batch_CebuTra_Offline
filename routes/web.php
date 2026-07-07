<?php

use App\Http\Controllers\TripController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [TripController::class, 'index'])->name('home');
    Route::get('/search', [TripController::class, 'search'])->name('trips.search');
    Route::post('/post', [TripController::class, 'store'])->name('trips.store');
    Route::post('/trips/{id}/join', [TripController::class, 'join'])->name('trips.join');
    // 非同期で叩くためのルート
    Route::post('/trips/{id}/favorite', [FavoriteController::class, 'toggle'])->name('trips.favorite');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
    
    // プロフィール用（Breeze標準を想定）
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');






// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\TripController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\EventController;
//use App\Http\Controllers\EventCreateController;
//use App\Http\Controllers\TripController;
//use App\Http\Controllers\ItineraryController;
//use App\Http\Controllers\ItineraryItemController;

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

#イベント一覧ページ
Route::get('/events',[EventController::class,'index'])->name('events.index');
Route::post('/events/store',{EventController::class,'store'})->name('events.store');
#イベント作成ページ
Route::get('/events/create/step1',[EventCreateController::class,'step1'])->name('events.create.step1');
Route::post('/events/create/step1',[EventCreateController::class,'storestep1'])->name('storestep1');
Route::get('/events/create/step2',[EventCreateController::class,'step2'])->name('events.create.step2');
Route::post('/events/create/step2',[EventCreateController::class,'storestep2'])->name('storestep2');
Route::get('/events/create/step3',[EventCreateController::class,'step3'])->name('events.create.step3');
Route::post('/events/create/step3',[EventCreateController::class,'storestep3'])->name('storestep3');
Route::get('/events/create/step4',[EventCreateController::class,'step4'])->name('events.create.step4');
Route::post('/events/create/step4',[EventCreateController::class,'storestep4'])->name('storestep4');
#イベント詳細ページ
Route::get('/events/{id}',[EventController::class,'show'])->name('events.show');
#旅程作成ページ
Route:middleware('auth')->group(function(){
    //旅程
    Route::resource('itineraries',ItineraryController::class);
    //アクティビティ
    Route::post('/itineraries/{trip}/items',[ItineraryItemController::class,'store'])->name('items.store');
    Route::put('/items/{item}',[ItineraryItemController::class,'update'])->name('items.update')
    Route::delete('/items/{item}',[ItineraryItemController::class,'destroy'])->name('items.destroy');
});

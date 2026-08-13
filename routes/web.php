<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventCreateController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\ItineraryItemController;


// ---------------------------------------------------------------------------
// Public routes – the first page the user sees
// ---------------------------------------------------------------------------

Route::view('/', 'welcome')->name('welcome');

// 2. ログイン・登録画面（GET表示）
Route::get('/login', [AuthController::class, 'showAuthForm'])->name('login.view');

// 3. フォームデータ送信（POST処理）
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');
// Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
// // Password reset request (placeholder view)
// Route::get('/password/request', function () {
//     return view('auth.passwords.email');
// })->name('password.request');


Route::middleware('guest')->group(function () {
    // 1. Show "Forgot Password" link request form
    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])
        ->name('password.request');

    // 2. Handle sending the reset link email
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])
        ->name('password.email');

    // 3. Show password reset form (triggered by link in email)
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])
        ->name('password.reset');

    // 4. Handle updating the password in DB
    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
        ->name('password.update');
});

// ---------------------------------------------------------------------------
// Auth‑protected routes (main application)
// ---------------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    // Home / Trip related routes
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/trips/home', [TripController::class, 'index'])->name('trips.home');
    Route::get('/search', [TripController::class, 'search'])->name('trips.search');
    Route::post('/post', [TripController::class, 'store'])->name('trips.store');
    Route::post('/trips/{id}/join', [TripController::class, 'join'])->name('trips.join');
    // Async favourite toggle
    Route::post('/trips/{id}/favorite', [FavoriteController::class, 'toggle'])->name('trips.favorite');

    // Profile basic routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Settings (simple pages)
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings.all');
    Route::get('/settings/emergency', [ProfileController::class, 'emergency'])->name('settings.emergency');
    Route::get('/settings/help', [ProfileController::class, 'help'])->name('settings.help');
    Route::get('/settings/instagram', [ProfileController::class, 'instagram'])->name('settings.instagram');
    Route::post('/settings/Instagram', [ProfileController::class, 'updateinstagram'])->name('setting.instagram.update');
    Route::get('/settings/language', [ProfileController::class, 'language'])->name('settings.language');
    Route::get('/settings/terms', [ProfileController::class, 'terms'])->name('settings.terms');
});

// ---------------------------------------------------------------------------
// Additional profile‑settings routes (still behind auth middleware)
// ---------------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('all-settings');
    Route::get('/profile/settings/instagram', [ProfileController::class, 'Instagram'])->name('setting.instagram');
    Route::post('/profile/settings/Instagram', [ProfileController::class, 'updateinstagram'])->name('setting.instagram.update');
    Route::get('/profile/settings/emergency', [ProfileController::class, 'emergency'])->name('setting.emergency');
    Route::get('/profile/settings/help', [ProfileController::class, 'helpCenter'])->name('setting.help');
    Route::get('/profile/settings/terms', [ProfileController::class, 'terms'])->name('setting.terms');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/settings/language', [ProfileController::class, 'editLanguage'])->name('setting.language');
    Route::post('/profile/settings/language', [ProfileController::class, 'updateLanguage'])->name('setting.language.update');
});

// ---------------------------------------------------------------------------
// Authentication UI routes
// ---------------------------------------------------------------------------
Route::get('/auth', [LoginController::class, 'showLoginForm'])->name('auth');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// ---------------------------------------------------------------------------
// Event routes
// ---------------------------------------------------------------------------
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events/store', [EventCreateController::class, 'store'])->name('events.store');
Route::get('/events/create/step1', [EventCreateController::class, 'step1'])->name('events.create.step1');
Route::post('/events/create/step1', [EventCreateController::class, 'storestep1'])->name('storestep1');
Route::get('/events/create/step2', [EventCreateController::class, 'step2'])->name('events.create.step2');
Route::post('/events/create/step2', [EventCreateController::class, 'storestep2'])->name('storestep2');
Route::get('/events/create/step3', [EventCreateController::class, 'step3'])->name('events.create.step3');
Route::post('/events/create/step3', [EventCreateController::class, 'storestep3'])->name('storestep3');
Route::get('/events/create/step4', [EventCreateController::class, 'step4'])->name('events.create.step4');
Route::post('/events/create/step4', [EventCreateController::class, 'storestep4'])->name('storestep4');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// ---------------------------------------------------------------------------
// Itinerary routes (auth protected)
// ---------------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::resource('itineraries', ItineraryController::class);
    Route::post('/itineraries/{trip}/items', [ItineraryItemController::class, 'store'])->name('items.store');
    Route::put('/items/{item}', [ItineraryItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItineraryItemController::class, 'destroy'])->name('items.destroy');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/', [TripController::class, 'index'])->name('home');
//     Route::get('/search', [TripController::class, 'search'])->name('trips.search');
//     Route::post('/post', [TripController::class, 'store'])->name('trips.store');
//     Route::post('/trips/{id}/join', [TripController::class, 'join'])->name('trips.join');
//     // 非同期で叩くためのルート
//     Route::post('/trips/{id}/favorite', [FavoriteController::class, 'toggle'])->name('trips.favorite');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
// });

    // プロフィール用（Breeze標準を想定）
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');



// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

#旅程作成ページ
Route::middleware('auth')->group(function(){
    //旅程
    Route::resource('itineraries',ItineraryController::class);
    //アクティビティ
    Route::post('/itineraries/{trip}/items',[ItineraryItemController::class,'store'])->name('items.store');
    Route::put('/items/{item}',[ItineraryItemController::class,'update'])->name('items.update');
    Route::delete('/items/{item}',[ItineraryItemController::class,'destroy'])->name('items.destroy');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\FavoriteController;
//use App\Http\Controllers\EventController;
//use App\Http\Controllers\EventCreateController;



#イベント一覧ページ
Route::get('/events',[EventController::class,'index'])->name('events.index');
Route::post('/events/store',[EventController::class,'store'])->name('events.store');
#イベント作成ページ
Route::get('/events/create/step1',[EventCreateController::class,'step1'])->name('events.create.step1');
Route::post('/events/create/step1',[EventCreateController::class,'storestep1'])->name('storestep1');
Route::get('/events/create/step2',[EventCreateController::class,'step2'])->name('events.create.step2');
Route::post('/events/create/step2',[EventCreateController::class,'storestep2'])->name('storestep2');
Route::get('/events/create/step3',[EventCreateController::class,'step3'])->name('events.create.step3');
Route::post('/events/create/step3',[EventCreateController::class,'storestep3'])->name('storestep3');
Route::get('/events/create/step4',[EventCreateController::class,'step4'])->name('events.create.step4');
Route::post('/events/create/step4',[EventCreateController::class,'storestep4'])->name('storestep4');


// 1. 免責事項画面
Route::view('/', 'welcome')->name('welcome');

// 2. ログイン・登録画面（GET表示）
Route::get('/login', [AuthController::class, 'showAuthForm'])->name('login.view');

// 3. フォームデータ送信（POST処理）
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// 4. 認証保護されているページ
Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home'); // ホーム画面
});


// 認証済み（Auth）ユーザーのみアクセスできるようにする場合の例
Route::middleware(['auth'])->group(function () {
    // 表示
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    // 編集画面
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    // 保存処理（POST送信先）
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


Route::middleware(['auth'])->group(function () {
    // プロフィール表示・編集
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // 💡 設定画面用のルート
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('all-settings');

    // 緊急連絡先用のルート
    Route::get('/profile/settings/emergency', [ProfileController::class, 'emergency'])->name('setting.emergency');

    // ヘルプセンター用のルート
    Route::get('/profile/settings/help', [ProfileController::class, 'helpCenter'])->name('setting.help');

    // 利用規約用のルート
    Route::get('/profile/settings/terms', [ProfileController::class, 'terms'])->name('setting.terms');

    // 💡 アカウント削除用のルート
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // 言語設定画面の表示
    Route::get('/profile/settings/language', [ProfileController::class, 'editLanguage'])->name('setting.language');
    
    // 💡 フォーム送信による言語更新処理（JSなし）
    Route::post('/profile/settings/language', [ProfileController::class, 'updateLanguage'])->name('setting.language.update');
});



// ログイン画面（auth.blade.php）へのルーティング
Route::get('/auth', [LoginController::class, 'showLoginForm'])->name('auth');

// ログアウト処理（POSTで受け取る）
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

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
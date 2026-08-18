<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\PostAdsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('models', ModelController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/post_ads', [PostAdsController::class, 'create']);
    Route::post('/post_ads', [PostAdsController::class, 'store']);
    Route::resource('post_ads/listed', PostAdsController::class);
    Route::resource('post_ads/approved', PostAdsController::class);
    Route::get('/post_ads/approved', [PostAdsController::class, 'approvedIndex'])->name('post_ads.approved');
    Route::patch('/post_ads/{id}/approve', [PostAdsController::class, 'approve'])->name('post_ads.approve');
    Route::get('/post_ads/rejected', [PostAdsController::class, 'rejectedIndex'])->name('post_ads.rejected');
    Route::patch('/post_ads/{id}/reject', [PostAdsController::class, 'reject'])->name('post_ads.rejected');
    Route::patch('/post_ads/{id}/sold', [PostAdsController::class, 'sold'])->name('post_ads.sold');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('/about', 'about');
    Route::resource('types', TypeController::class);
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::resource('contactmessages', ContactMessageController::class);
    });
Route::get('/contact', [ContactMessageController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
Route::view('/about', 'about');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

<?php

use App\Http\Controllers\ModelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;


// Route::get('/', [SessionController::class, 'create'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('models', ModelController::class);
    Route::view('/about', 'about');
    Route::resource('types', TypeController::class);
});
Route::view('/contact', 'contact');
Route::view('/about', 'about');
Route::view('/', 'home');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

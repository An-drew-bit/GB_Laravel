<?php

use App\Http\Controllers\{
    AuthController, CategoryController, HomeController,
    UserController, NewsController
};
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('category');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::controller(NewsController::class)->group(function () {
        Route::get('/news/create', 'create')->name('news.create');
        Route::post('/news/add', 'store')->name('news.store');
    });
});

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/register', 'showRegisterForm')->name('register.showForm');
        Route::post('/register', 'store')->name('register.store');

        Route::get('/login', 'showLoginForm')->name('login.showForm');
        Route::post('/login', 'login')->name('login');
    });
});

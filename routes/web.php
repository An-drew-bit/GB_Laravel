<?php

use App\Http\Controllers\{HomeController, UserController};
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)
    ->name('home');

Route::get('/category', [])
    ->name('category');

Route::controller(UserController::class)->group(function () {
    Route::get('/register', 'create')
        ->name('register.create');

    Route::post('/register', 'store')
        ->name('register.store');

    Route::get('/login', 'loginIn')
        ->name('login.create');

    Route::post('/login', 'login')
        ->name('login');
});

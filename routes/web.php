<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');

Route::controller(\App\Http\Controllers\Auth\VerificationController::class)->group(function () {
    Route::get('/email/verify', 'getVerifyForm')->middleware('auth')
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', 'verifycationRequest')->middleware('auth')
        ->name('verification.verify');

    Route::post('/email/verification-notification', 'repeatSendToMail')->middleware(['auth', 'throttle:6,1'])
        ->name('verification.send');
});

Route::controller(\App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('category');
});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', \App\Http\Controllers\Admin\MainController::class)->name('admin.index');

    Route::resource('/category', \App\Http\Controllers\Admin\CategoryController::class)
        ->names('admin.category');

    Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class)
        ->names('admin.news');

    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class)
        ->names('admin.users');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

    Route::controller(\App\Http\Controllers\NewsController::class)->group(function () {
        Route::get('/news/create', 'create')->name('news.create');
        Route::post('/news/add', 'store')->name('news.store');
    });

    Route::controller(\App\Http\Controllers\FeedbackController::class)->group(function () {
        Route::get('/feedback', 'index')->name('feedback.index');


    });
});

Route::controller(\App\Http\Controllers\NewsController::class)->group(function () {
    Route::get('/news', 'index')->name('news.index');

    Route::get('/news/{slug}', 'showNew')->name('news.view');
});


Route::middleware('guest')->group(function () {
    Route::get('/feedback', [\App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback.index');

    Route::controller(\App\Http\Controllers\Auth\AuthController::class)->group(function () {
        Route::get('/register', 'showRegisterForm')->name('register.showForm');
        Route::post('/register', 'store')->name('register.store');

        Route::get('/forgot', 'showForgotForm')->name('login.showForgotForm');
        Route::post('/forgot', 'forgot')->name('login.forgot');

        Route::get('/login', 'showLoginForm')->name('login.showForm');
        Route::post('/login', 'login')->name('login');
    });
});

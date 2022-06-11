<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::post('/', 'subscribe')->name('subscribe');
});

Route::get('/search', \App\Http\Controllers\SearchController::class)->name('search');

Route::controller(\App\Http\Controllers\Auth\VerificationController::class)->group(function () {
    Route::get('/email/verify', 'getVerifyForm')
        ->middleware('auth')
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', 'verifycationRequest')
        ->middleware('auth')
        ->name('verification.verify');

    Route::post('/email/verification-notification', 'repeatSendToMail')
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.send');
});

Route::controller(\App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{slug}', 'getCategoryBySlug')->name('categories.view');
});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', \App\Http\Controllers\Admin\MainController::class)->name('admin.index');
    Route::get('/parser', \App\Http\Controllers\Admin\ParserController::class)->name('admin.parser');

    Route::resource('/category', \App\Http\Controllers\Admin\CategoryController::class)
        ->names('admin.category');

    Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class)
        ->names('admin.news');

    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class)
        ->names('admin.users');

    Route::resource('/resource', \App\Http\Controllers\Admin\ResourceController::class)
        ->names('admin.resource');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

    Route::controller(\App\Http\Controllers\NewsController::class)->group(function () {
        Route::get('/news/create', 'create')->name('news.create');
        Route::post('/news/add', 'store')->name('news.store');
    });

    Route::controller(\App\Http\Controllers\FeedbackController::class)->group(function () {
        Route::get('/feedback', 'index')->name('feedback.index');
        Route::post('/feedback', 'store')->name('feedback.store');
    });
});

Route::controller(\App\Http\Controllers\NewsController::class)->group(function () {
    Route::get('/news', 'index')->name('news.index');
    Route::get('/news/{slug}', 'showNew')->name('news.view');
});

Route::get('/feedback', [\App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback.index');

Route::middleware('guest')->group(function () {
    Route::controller(\App\Http\Controllers\Auth\AuthController::class)->group(function () {
        Route::get('/register', 'showRegisterForm')->name('register.showForm');
        Route::post('/register', 'store')->name('register.store');

        Route::get('/login/{driver}/redirect', [\App\Http\Controllers\Auth\SocialController::class, 'redirect'])
            ->where('driver', '\w+')
            ->name('social.redirect');
        Route::get('/login/{driver}/callback', [\App\Http\Controllers\Auth\SocialController::class, 'callback'])
            ->where('driver', '\w+')
            ->name('social.callback');

        Route::get('/forgot', 'showForgotForm')->name('login.showForgotForm');
        Route::post('/forgot', 'forgot')->name('login.forgot');

        Route::get('/login', 'showLoginForm')->name('login.showForm');
        Route::post('/login', 'login')->name('login');
    });
});

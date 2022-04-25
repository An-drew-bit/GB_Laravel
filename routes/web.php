<?php

use App\Http\Controllers\{HomeController, NewsController};
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/news', NewsController::class)->name('news');

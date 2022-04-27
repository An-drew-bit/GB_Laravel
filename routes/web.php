<?php

use App\Http\Controllers\{CategoryController, HomeController, NewsController};
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('show');
Route::get('/category/show/{id}', [CategoryController::class, 'singleNew'])->name('singleNew');

<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPageController::class)->name('landing');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

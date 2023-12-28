<?php

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ResourceController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', HomeController::class)->name('home');

Route::get('/resources/{resource}/view', [ResourceController::class, 'view'])
    ->name('public.resources.view');

Route::get('/resources/{resource}', [ResourceController::class, 'show'])
    ->name('public.resources.show');

Route::get('/search/{query}', function () {
    return Inertia::render('Public/Search');
})->name('search');

Route::get('/explore', function () {
    return Inertia::render('Public/Explore');
})->name('search');

Route::get('/about', function () {
    return Inertia::render('Public/About');
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('Public/ContactUs');
})->name('contact');


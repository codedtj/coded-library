<?php

use App\Http\Controllers\File\FileController;
use App\Http\Controllers\File\ImageFileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/public.php';
require __DIR__.'/auth.php';
require __DIR__.'/library.php';

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('files')->group(function () {
    Route::get('{file}/download', [FileController::class, 'download'])->name('files.download');

    Route::get('/{file}', [FileController::class, 'view'])->name('files.view');
});

Route::get('/images/{image}', [ImageFileController::class, 'show'])->name('images.show');

Route::prefix('tags')->group(function () {
    Route::get('/filtered/{name}', 'FilteredTagController@index');
});

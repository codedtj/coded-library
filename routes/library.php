<?php

use App\Http\Controllers\Library\CategoryResourceController;
use App\Http\Controllers\Library\FavouriteResourceController;
use App\Http\Controllers\Library\FilteredResourceController;
use App\Http\Controllers\Library\GradeResourceController;
use App\Http\Controllers\Library\MyResourceController;
use App\Http\Controllers\Library\RandomResourceController;
use App\Http\Controllers\Library\ResourceController;
use App\Http\Controllers\Library\StatisticResourceController;
use App\Http\Controllers\Library\ThemeResourceController;
use App\Http\Controllers\Public\SearchController;
use Illuminate\Support\Facades\Route;

Route::prefix('core')->group(function () {
    Route::get('/videos/random', [RandomResourceController::class, 'getAnyVideo'])->name('videos.random');

    Route::resource('resources', ResourceController::class);

    Route::get('/resources/{resource}/download', [ResourceController::class, 'download'])
        ->name('resources.download');

    Route::get('/resources/{resource}/open', [ResourceController::class, 'open'])->name('resources.open');

    Route::get('/search/{query}', [SearchController::class, 'index'])->name('search');

    Route::get('/grades/resources', [GradeResourceController::class, 'index'])
        ->name('grade-resources.index');

    Route::get('/grades/{grade}/resources', [GradeResourceController::class, 'show'])
        ->name('grade-resources.show');

    Route::get('/categories/resources', [CategoryResourceController::class, 'index'])
        ->name('category-resources.index');

    Route::get('/categories/{category}/resources', [CategoryResourceController::class, 'show'])
        ->name('category-resources.show');

    Route::get('/themes/resources', [ThemeResourceController::class, 'index'])
        ->name('theme-resources.index');

    Route::get('/themes/{theme}/resources',  [ThemeResourceController::class, 'show'])
        ->name('theme-resources.show');

    Route::get('/my/resources', [MyResourceController::class, 'show'])->name('my-resources');

    Route::get('/filtered/resources', [FilteredResourceController::class, 'index'])
        ->name('filtered-resources.index');

    Route::resource('favourites', FavouriteResourceController::class)->only([
        'index', 'store', 'destroy'
    ]);
    Route::resource('statistic', StatisticResourceController::class);

    Route::get('/resources/random', [RandomResourceController::class, 'getAny'])->name('resources.random');
});

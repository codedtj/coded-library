<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blueprint::macro('userstamps', function () {
            $this->foreignUuid('created_by')->nullable()->references('id')->on('users');
            $this->foreignUuid('updated_by')->nullable()->references('id')->on('users');
            $this->foreignUuid('deleted_by')->nullable()->references('id')->on('users');
        });
    }
}

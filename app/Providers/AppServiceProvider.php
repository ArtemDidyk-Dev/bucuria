<?php

namespace App\Providers;

use App\Services\PageAccess;
use App\Services\PageAccessInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PageAccessInterface::class, PageAccess::class);
    }
}

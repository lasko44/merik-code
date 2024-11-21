<?php

namespace App\Providers;

use App\Utilities\ComponentUtil\ComponentUtil;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('componentUtil', function (){
            return new ComponentUtil();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}

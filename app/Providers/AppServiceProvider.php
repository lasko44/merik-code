<?php

namespace App\Providers;

use App\Models\Component;
use App\Policies\ComponentPolicy;
use App\Utilities\ComponentUtil;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('ComponentUtil', function (){
            return new ComponentUtil();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Component::class, ComponentPolicy::class);
    }
}

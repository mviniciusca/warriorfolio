<?php

namespace App\Providers;

use App\Models\Maintenance;
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

        // check if model exists on database before sharing it to all views
        if (Maintenance::all()->isEmpty()) {
            return;
        }
        view()->share(
            'maintenance',
            Maintenance::all()->first()->is_active,
        );
        view()->share(
            'discovery',
            Maintenance::all()->first()->is_discovery,
        );
    }
}

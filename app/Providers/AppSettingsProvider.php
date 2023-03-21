<?php

namespace App\Providers;

use App\Models\PagesSettings;
use Illuminate\Support\ServiceProvider;

class AppSettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $settings = PagesSettings::first();
        // save in cahce
       // cache()->forever('settings', $settings);
        // share with all views
        view()->share('settings', $settings);
    }
}

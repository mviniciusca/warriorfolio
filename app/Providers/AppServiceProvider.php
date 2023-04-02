<?php

namespace App\Providers;

use Termwind\Components\Dd;
use Filament\Facades\Filament;
use App\Http\Controllers\Settings;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;
use HtmlSanitizer\Extension\Listing\Node\DdNode;

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
        // Filament Navigation Group
        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');

            // Navigation Items
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                ->label('Mail'),
                NavigationGroup::make()
                    ->label('Portfolio'),
                NavigationGroup::make()
                    ->label('Profile'),
                NavigationGroup::make()
                    ->label('Hero Section'),
                NavigationGroup::make()
                    ->label('Customers'),
                NavigationGroup::make()
                    ->label('App Settings'),
            ]);

            // Scripts
            Filament::registerScripts([
                    'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js',
                    'https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js',
                    'https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js',
                ], true);

        });
    }
}

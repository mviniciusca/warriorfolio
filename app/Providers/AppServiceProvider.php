<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
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
        //Filament Navigation Group
        Filament::serving(function () {
          Filament::registerNavigationGroups([
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
        });
    }
}

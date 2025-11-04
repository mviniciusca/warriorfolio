<?php

namespace App\Providers;

use App\Models\Core;
use App\Models\Maintenance;
use App\View\Components\Ui\Quickbar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('settings')) {
            $maintenance = optional(Maintenance::first(['is_active', 'is_discovery']));
            view()->share([
                'discovery'   => $maintenance->is_discovery ?? false,
                'maintenance' => $maintenance->is_active ?? false,
            ]);
        }

        if (Schema::hasTable('cores')) {
            $data = Core::first([
                'footer',
                'header',
            ]);
            view()
                ->share([
                    'footer_core' => $data->footer ?? false,
                    'header_core' => $data->header ?? false,
                ]);
        }
    }
}

<?php

namespace App\Providers;

use App\Models\Core;
use App\Models\Maintenance;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            //$this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $maintenance = optional(Maintenance::first(['is_active', 'is_discovery']));
        view()->share([
            'discovery'   => $maintenance->is_discovery ?? false,
            'maintenance' => $maintenance->is_active ?? false,
        ]);

        if (Schema::hasTable('cores')) {
            $data = Core::first([
                'about',
                'clients',
                'contact',
                'footer',
                'header',
                'hero',
                'newsletter',
                'portfolio',
            ]);
            view()
                ->share([
                    'about_core'      => $data->about ?? true,
                    'clients_core'    => $data->clients ?? true,
                    'contact_core'    => $data->contact ?? true,
                    'footer_core'     => $data->footer ?? true,
                    'header_core'     => $data->header ?? true,
                    'hero_core'       => $data->hero ?? true,
                    'newsletter_core' => $data->newsletter ?? true,
                    'portfolio_core'  => $data->portfolio ?? true,
                ]);
        }
    }
}

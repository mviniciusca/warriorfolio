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
        //
    }

    /**
     * Bootstrap any application services.
     */


    public function boot(): void
    {
        if (Schema::hasTable('maintenances')) {
            view()->share([
                'maintenance' => Maintenance::all()->first()->is_active,
                'discovery' => Maintenance::all()->first()->is_discovery,
            ]);

            if (Schema::hasTable('cores')) {
                $data = Core::query()
                    ->select(
                        [
                            'header',
                            'footer',
                            'newsletter',
                            'clients',
                            'contact',
                            'hero',
                            'portfolio',
                            'about'
                        ]
                    )->first();
                view()->share([
                    'hero_core' => $data->hero,
                    'portfolio_core' => $data->portfolio,
                    'about_core' => $data->about,
                    'header_core' => $data->header,
                    'footer_core' => $data->footer,
                    'newsletter_core' => $data->newsletter,
                    'clients_core' => $data->clients,
                    'contact_core' => $data->contact,
                ]);
            }
        }


    }
}

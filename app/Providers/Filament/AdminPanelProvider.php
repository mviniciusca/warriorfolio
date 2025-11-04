<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use App\Models\Setting;
use Awcodes\Curator\CuratorPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Z3d0X\FilamentFabricator\FilamentFabricatorPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->breadcrumbs(true)
            ->login()
            ->maxContentWidth('Full')
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->brandLogo(asset('img/core/logo-app.svg'))
            ->brandLogoHeight('2rem')
            ->favicon(asset('img/core/favicon.png'))
            ->navigationItems([
                NavigationItem::make(__('View Website'))
                    ->url(env('APP_URL'), shouldOpenInNewTab: true)
                    ->icon('heroicon-o-arrow-up-right')
                    ->sort(-1),
                NavigationItem::make(__('Background & Logo'))
                    ->icon('heroicon-o-paint-brush')
                    ->url('/admin/settings/'.$this->getSetting().'/edit-appearance')
                    ->group(__('Website Design'))
                    ->sort(1),
                NavigationItem::make(__('Navigation'))
                    ->icon('heroicon-o-bars-3-bottom-left')
                    ->url('/admin/settings/'.$this->getSetting().'/edit-navigation')
                    ->group(__('Website Design'))
                    ->sort(1),
                NavigationItem::make(__('Log Viewer'))
                    ->icon('heroicon-o-arrow-up-right')
                    ->url('/admin/logs')
                    ->group(__('Settings'))
                    ->sort(3),
            ])
            ->plugins([
                FilamentFabricatorPlugin::make(),
                CuratorPlugin::make()
                    ->label('Media')
                    ->pluralLabel('Media Library')
                    ->navigationIcon('heroicon-o-rectangle-stack')
                    ->navigationSort(2)
                    ->navigationCountBadge(),
            ])
            ->resources([
                config('filament-logger.activity_resource'),
            ])
            ->colors([
                'primary'   => Color::Purple,
                'secondary' => Color::Zinc,
                'gray'      => Color::Zinc,
            ])
            ->navigationGroups([
                'Core Features',
                'Website Design',
                'App Sections',
                'Settings',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    private function getSetting()
    {
        if (Schema::hasTable('settings')) {
            $setting = Setting::first(['id']);

            return $setting ? $setting->value('id') : null;
        }

        return null;
    }
}

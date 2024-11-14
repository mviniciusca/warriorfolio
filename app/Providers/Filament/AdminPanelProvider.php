<?php

namespace App\Providers\Filament;

use App\Filament\Resources\CustomMediaResource;
use Awcodes\Curator\CuratorPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
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
            ->login()
            ->breadcrumbs(false)
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->brandLogo(asset('img/core/logo-app.svg'))
            ->brandLogoHeight('2rem')
            ->favicon(asset('img/core/favicon.png'))
            ->navigationItems([
                NavigationItem::make(__('Your Website'))
                    ->url(env('APP_URL'), shouldOpenInNewTab: true)
                    ->icon('heroicon-o-arrow-up-right')
                    ->sort(-1),
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
            ])
            ->navigationGroups([
                'App Sections',
                'Core Features',
                'Settings',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
}

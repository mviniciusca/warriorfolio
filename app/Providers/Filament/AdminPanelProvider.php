<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use App\Filament\Resources\PageResource;
use App\Filament\Resources\PostResource;
use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\SettingResource;
use App\Models\Setting;
use Awcodes\Curator\CuratorPlugin;
use Closure;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
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
            ->bootUsing(function (): void {
                \Filament\Forms\Components\Toggle::configureUsing(function (\Filament\Forms\Components\Toggle $toggle): void {
                    $toggle->onIcon('heroicon-m-check');
                });
                \Filament\Tables\Columns\ToggleColumn::configureUsing(function (\Filament\Tables\Columns\ToggleColumn $column): void {
                    $column->onIcon('heroicon-m-check');
                });

                // Default Filament is Start (sidebar). Set Top for resources/pages that inherit the base property.
                // Runs with the panel (not service provider boot) so core classes are loaded; use leading \ to avoid import clashes.
                $top = \Filament\Pages\SubNavigationPosition::Top;

                try {
                    $resourceProp = new \ReflectionProperty(\Filament\Resources\Resource::class, 'subNavigationPosition');
                    $resourceProp->setAccessible(true);
                    $resourceProp->setValue(null, $top);
                } catch (\Throwable) {
                    // Filament internals may rename the property in a future version.
                }

                try {
                    $pageProp = new \ReflectionProperty(\Filament\Pages\Page::class, 'subNavigationPosition');
                    $pageProp->setAccessible(true);
                    $pageProp->setValue(null, $top);
                } catch (\Throwable) {
                }
            })
            ->default()
            ->id('admin')
            ->path('admin')
            ->breadcrumbs(true)
            ->login()
            ->maxContentWidth('Full')
            /*
             * Navegação principal horizontal (topbar), em vez da sidebar.
             * Para voltar ao menu lateral: comente ou remova a linha abaixo.
             */
            ->topNavigation()
            ->sidebarCollapsibleOnDesktop()
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->font(
                'Geist',
                'https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap',
                GoogleFontProvider::class,
            )
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->brandLogo(asset('img/core/logo-app.svg'))
            ->brandLogoHeight('2rem')
            ->favicon(asset('img/core/favicon.png'))
            ->navigationItems([
                NavigationItem::make(__('View Website'))
                    ->url(env('APP_URL'), shouldOpenInNewTab: true)
                    ->icon('heroicon-o-arrow-up-right')
                    ->sort(-1),
                NavigationItem::make(__('New Note'))
                    ->icon('heroicon-o-document-plus')
                    ->url(fn (): string => PostResource::getUrl('create'))
                    ->group(__('Workspace'))
                    ->sort(-30),
                NavigationItem::make(__('New Project'))
                    ->icon('heroicon-o-rocket-launch')
                    ->url(fn (): string => ProjectResource::getUrl('create'))
                    ->group(__('Workspace'))
                    ->sort(-29),
                NavigationItem::make(__('New Page'))
                    ->icon('heroicon-o-rectangle-stack')
                    ->url(fn (): string => PageResource::getUrl('create'))
                    ->group(__('Workspace'))
                    ->sort(-28),
                NavigationItem::make(__('Background & Logo'))
                    ->icon('heroicon-o-paint-brush')
                    ->url($this->settingShortcutUrl('edit-appearance'))
                    ->group(__('Site shortcuts'))
                    ->sort(1),
                NavigationItem::make(__('Navigation'))
                    ->icon('heroicon-o-bars-3-bottom-left')
                    ->url($this->settingShortcutUrl('edit-navigation'))
                    ->group(__('Site shortcuts'))
                    ->sort(2),
                NavigationItem::make(__('Notes Section'))
                    ->icon('heroicon-o-pencil-square')
                    ->url($this->settingShortcutUrl('edit-blog'))
                    ->group(__('Site shortcuts'))
                    ->sort(3),
                NavigationItem::make(__('Whatsapp Chatbox'))
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->url($this->settingShortcutUrl('edit-chatbox'))
                    ->group(__('Site shortcuts'))
                    ->sort(4),
                NavigationItem::make(__('Maintenance Mode'))
                    ->icon('heroicon-o-wrench-screwdriver')
                    ->url($this->settingShortcutUrl('edit-maintenance-section'))
                    ->group(__('Site shortcuts'))
                    ->sort(5),
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
                    ->navigationGroup(__('Library'))
                    ->navigationSort(10)
                    ->navigationCountBadge(),
            ])
            ->resources([
                config('filament-logger.activity_resource'),
            ])
            ->colors([
                'primary' => Color::Neutral,
                'secondary' => Color::Neutral,
                'gray' => Color::Neutral,
            ])
            ->navigationGroups([
                NavigationGroup::make(__('Workspace'))->collapsible(),
                NavigationGroup::make(__('Library'))->collapsed(),
                NavigationGroup::make(__('Site shortcuts'))->collapsed(),
                NavigationGroup::make(__('Settings'))->collapsed(),
            ])
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\\Filament\\Clusters')
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

    /**
     * Lazy URL for a SettingResource sub-page: must not call getUrl() while the panel
     * is still registering (current panel is null → generateRouteName() error).
     */
    private function settingShortcutUrl(string $page): Closure
    {
        return function () use ($page): string {
            $id = $this->getSetting();

            if ($id === null) {
                return '#';
            }

            return SettingResource::getUrl($page, ['record' => $id]);
        };
    }
}

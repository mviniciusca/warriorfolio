<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AlertWidget;
use App\Filament\Widgets\CoreModuleWidget;
use App\Filament\Widgets\LogActivityWidget;
use App\Filament\Widgets\MailWidget;
use App\Filament\Widgets\PostsWidget;
use App\Filament\Widgets\ProfileWidget;
use App\Filament\Widgets\ProjectWidget;
use App\Filament\Widgets\SliderWidget;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\SubscriberWidget;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard';

    protected static ?string $navigationIcon = 'heroicon-o-home';

    public function getColumns(): int | array
    {
        return [
            'default' => 1,
            'sm'      => 1,
            'md'      => 2,
            'lg'      => 3,
            'xl'      => 4,
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    public function getWidgets(): array
    {
        return [
            // Row 1 - Full Width Messages
            MailWidget::class,

            // Row 2 - Projects and Posts
            ProjectWidget::class,
            PostsWidget::class,

            // Row 3 - Profile and Alerts
            ProfileWidget::class,
            AlertWidget::class,

            // Row 4 - Content Management
            SliderWidget::class,
            SubscriberWidget::class,

            // Row 5 - System Overview
            CoreModuleWidget::class,
            LogActivityWidget::class,
        ];
    }

    public function getHeading(): string
    {
        return __('Dashboard');
    }
}

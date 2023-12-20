<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Mail;
use App\Models\Newsletter;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Newsletter Subscribers', Newsletter::count())
                ->description('overall subscribers')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('primary'),
            Stat::make('Inbox', Mail::unread()->count())
                ->descriptionIcon('heroicon-m-inbox')
                ->description('Unread Messages')
                ->color('primary'),
            Stat::make('Projects', Project::published()->count())
                ->descriptionIcon('heroicon-m-photo')
                ->description('Published')
                ->color('primary'),
            Stat::make('Categories', Category::count())
                ->descriptionIcon('heroicon-m-tag')
                ->description('Created')
                ->color('primary'),
        ];
    }
}

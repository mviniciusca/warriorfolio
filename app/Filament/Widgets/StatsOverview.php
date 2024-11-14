<?php

namespace App\Filament\Widgets;

use App\Models\Mail;
use App\Models\Maintenance;
use App\Models\Newsletter;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    //protected static ?string $pollingInterval = '30s';
    protected function getStats(): array
    {
        return [
            Stat::make('Application Status', '')
                ->icon('heroicon-o-wrench-screwdriver')
                ->value(view('components.badge', ['status' => Maintenance::first()]))
                ->description(Maintenance::first()->is_active ? 'Maintenance Mode' : 'Application is Live')
                ->color('primary'),

            Stat::make('Subscribers', Newsletter::counter())
                ->icon('heroicon-o-megaphone')
                ->color('primary')
                ->description('Newsletter Subscribers')
                ->chart(Newsletter::chartSubscribers()),

            Stat::make('Inbox', Mail::counter())
                ->icon('heroicon-o-inbox')
                ->color('primary')
                ->description('Messages in Inbox')
                ->chart(Mail::chartInbox()),

            Stat::make('Projects', Project::published()->count())
                ->icon('heroicon-o-rocket-launch')
                ->description('Published Projects')
                ->color('primary'),
        ];
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Mail;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Maintenance;
use Illuminate\View\View;
use App\Models\Newsletter;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

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
                ->color(Maintenance::first()->is_active ? 'danger' : 'success'),
            Stat::make('Subscribers', Newsletter::counter())
                ->color('primary')
                ->description('Newsletter Subscribers')
                ->chart(Newsletter::chartSubscribers()),
            Stat::make('Inbox', Mail::counter())
                ->color('primary')
                ->description('Messages in Inbox')
                ->chart(Mail::chartInbox()),
            Stat::make('Projects', Project::published()->count())
                ->description('Published Projects')
                ->color('primary'),
        ];
    }
}

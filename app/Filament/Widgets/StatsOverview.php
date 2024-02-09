<?php

namespace App\Filament\Widgets;

use App\Models\Mail;
use App\Models\Project;
use App\Models\Category;
use App\Models\Newsletter;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '40s';
    protected function getStats(): array
    {
        return [
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
            Stat::make('Categories', Category::query()->where('is_active', true)->count())
                ->description('Active Categories')
                ->color('primary'),
        ];
    }
}

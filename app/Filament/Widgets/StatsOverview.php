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
            Stat::make('Newsletter Subscribers', Newsletter::counter())
                ->color('primary')
                ->chart(Newsletter::chartSubscribers()),
            Stat::make('Inbox', Mail::counter())
                ->color('primary')
                ->chart(Mail::chartInbox()),
            Stat::make('Projects', Project::published()->count())
                ->color('primary'),
            Stat::make('Categories', Category::count())
                ->color('primary'),
        ];
    }
}

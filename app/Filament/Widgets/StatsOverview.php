<?php

namespace App\Filament\Widgets;

use App\Models\Mail;
use App\Models\Maintenance;
use App\Models\Newsletter;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{
    //protected static ?string $pollingInterval = '30s';
    protected function getStats(): array
    {
        return [
            Stat::make(__('Website Status'), '')
                ->url(route('filament.admin.resources.settings.edit', Auth::user()?->id))
                ->icon('heroicon-o-wifi')
                ->value(view('components.badge', ['status' => Maintenance::first()]))
                ->description(Maintenance::first()->is_active ? __('Maintenance Mode') : __('Website is Live'))
                ->color('primary'),
            Stat::make(__('Mailing List'), Newsletter::counter())
                ->icon('heroicon-o-megaphone')
                ->url(route('filament.admin.resources.newsletters.index'))
                ->color('primary')
                ->description(__('Subscribers'))
                ->chart(Newsletter::chartSubscribers()),
            Stat::make(__('Inbox'), Mail::where('is_read', false)
                ->where('is_sent', '=', false)
                ->count())
                ->url(route('filament.admin.resources.mails.index'))
                ->icon('heroicon-o-inbox')
                ->color('primary')
                ->description(__('Unread Messages'))
                ->chart(Mail::chartInbox()),
            Stat::make(__('Projects'), Project::published()->count())
                ->icon('heroicon-o-rocket-launch')
                ->url(route('filament.admin.resources.projects.index'))
                ->description(__('Published Projects'))
                ->color('primary'),
        ];
    }
}

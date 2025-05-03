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
    protected function getStats(): array
    {
        return [
            // Website Status Widget
            Stat::make(__('Website Status'), '')
                ->url(route('filament.admin.resources.settings.edit', Auth::user()?->id))
                ->icon('heroicon-o-wifi')
                ->value(view('components.filament.dashboard.badge', ['status' => Maintenance::first()]))
                ->description(Maintenance::first()->is_active ? __('Maintenance Mode') : __('Website is Live'))
                ->color(Maintenance::first()->is_active ? 'warning' : 'success')
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),

            // Mailing List Widget
            Stat::make(__('Newsletter'), Newsletter::counter())
                ->icon('heroicon-o-megaphone')
                ->url(route('filament.admin.resources.newsletters.index'))
                ->description(__('Total Subscribers'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart(Newsletter::chartSubscribers())
                ->color('info')
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),

            // Inbox Widget
            Stat::make(__('Messages'), Mail::where('is_read', false)->where('is_sent', '=', false)->count())
                ->url(route('filament.admin.resources.mails.index'))
                ->icon('heroicon-o-inbox-stack')
                ->description(Mail::where('is_important', true)->count().' '.__('Important'))
                ->descriptionIcon('heroicon-m-star')
                ->chart(Mail::chartInbox())
                ->color('warning')
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),

            // Projects Widget
            Stat::make(__('Projects'), Project::published()->count() ?: '--')
                ->icon('heroicon-o-rocket-launch')
                ->url(route('filament.admin.resources.projects.index'))
                ->description(Project::all()->count().' '.__('Total'))
                ->descriptionIcon('heroicon-m-squares-2x2')
                ->color('success')
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),
        ];
    }
}

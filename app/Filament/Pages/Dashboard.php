<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AlertWidget;
use App\Filament\Widgets\CommentsModerationWidget;
use App\Filament\Widgets\CoreModuleWidget;
use App\Filament\Widgets\LogActivityWidget;
use App\Filament\Widgets\MailWidget;
use App\Filament\Widgets\NotificationsWidget;
use App\Filament\Widgets\PostsWidget;
use App\Filament\Widgets\ProfileWidget;
use App\Filament\Widgets\ProjectWidget;
use App\Filament\Widgets\SliderWidget;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\SubscriberWidget;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard';

    /** @var view-string */
    protected static string $view = 'filament.pages.dashboard';

    public string $activeTab = 'pulse';

    protected array $queryString = [
        'activeTab' => ['except' => 'pulse', 'as' => 'tab'],
    ];

    public function getSubheading(): string|Htmlable|null
    {
        $hour = Carbon::now()->hour;
        $greeting = match (true) {
            $hour >= 5 && $hour < 12 => __('Good morning'),
            $hour >= 12 && $hour < 18 => __('Good afternoon'),
            default => __('Good evening'),
        };

        $name = Auth::user()?->name;
        $greetingLine = filled($name)
            ? $greeting.', '.$name.'!'
            : $greeting.'!';
        $tabSubtitle = $this->getTabSubheading();

        if ($tabSubtitle === '') {
            return $greetingLine;
        }

        return new HtmlString(
            '<span class="block">'.e($greetingLine).'</span>'
            .'<span class="mt-1 block text-sm text-gray-500 dark:text-gray-400">'.e($tabSubtitle).'</span>'
        );
    }

    /**
     * Context line for the active dashboard section (shown under the greeting).
     */
    protected function getTabSubheading(): string
    {
        return match ($this->activeTab) {
            'pulse' => __(
                'Pulse combines key metrics with global module visibility—what you toggle here affects fixed slots across the public layout, not individual pages.'
            ),
            'checks' => __(
                'System checks surface configuration and environment issues before they become outages. Address items here, or dismiss them if you accept the risk.'
            ),
            'inbox' => __(
                'Inbox and moderation: unread messages from your forms and comments waiting for approval.'
            ),
            'studio' => __(
                'Studio pulls together projects, notes, and sliders so you can edit the creative surface of your site from one place.'
            ),
            'audience' => __(
                'Audience covers how you present yourself and how subscribers grow: profile summary, newsletter trend, and visitor-facing alerts.'
            ),
            'activity' => __(
                'Activity is the audit trail—who changed what and when across the admin.'
            ),
            default => '',
        };
    }

    protected static ?string $navigationIcon = 'heroicon-o-home';

    public function getColumns(): int|array
    {
        return match ($this->activeTab) {
            'pulse' => [
                'default' => 1,
                'sm' => 1,
                'md' => 2,
                'lg' => 3,
                'xl' => 4,
            ],
            'inbox', 'studio', 'audience' => [
                'default' => 1,
                'md' => 2,
                'xl' => 3,
            ],
            'checks' => [
                'default' => 1,
            ],
            default => [
                'default' => 1,
                'lg' => 2,
            ],
        };
    }

    protected function getHeaderWidgets(): array
    {
        return [];
    }

    public function getWidgets(): array
    {
        return match ($this->activeTab) {
            'pulse' => [
                StatsOverview::class,
                CoreModuleWidget::class,
            ],
            'checks' => [
                NotificationsWidget::class,
            ],
            'inbox' => [
                MailWidget::class,
                CommentsModerationWidget::class,
            ],
            'studio' => [
                ProjectWidget::class,
                PostsWidget::class,
                SliderWidget::class,
            ],
            'audience' => [
                ProfileWidget::class,
                SubscriberWidget::class,
                AlertWidget::class,
            ],
            'activity' => [
                LogActivityWidget::class,
            ],
            default => [],
        };
    }

    public function getHeading(): string
    {
        return __('Dashboard');
    }
}

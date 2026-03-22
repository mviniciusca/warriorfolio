<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\MailResource;
use App\Filament\Resources\NewsletterResource;
use App\Filament\Resources\PostResource;
use App\Filament\Resources\ProfileResource;
use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\SettingResource;
use App\Models\Category;
use App\Models\Chatbox;
use App\Models\Mail;
use App\Models\Maintenance;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Setting;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 4;

    /**
     * Filament Stat::url() only accepts ?string (not Closure).
     */
    protected function statUrl(mixed $url): ?string
    {
        return is_string($url) ? $url : null;
    }

    protected function getColumns(): int
    {
        $count = count($this->getCachedStats());

        if ($count < 4) {
            return 4;
        }

        if (($count % 4) !== 1) {
            return 4;
        }

        return 4;
    }

    protected function getStats(): array
    {
        $settingId = Setting::query()->value('id');
        $settingsEditUrl = null;
        $settingsChatboxUrl = null;
        if ($settingId !== null && $settingId !== '') {
            $settingsEditUrl = (string) SettingResource::getUrl('edit', ['record' => $settingId]);
            $settingsChatboxUrl = (string) SettingResource::getUrl('edit-chatbox', ['record' => $settingId]);
        }

        return [
            // Website Status Widget (Improved)
            Stat::make(
                __('Website Status'),
                Maintenance::first()->is_active ? __('Maintenance') : __('Live')
            )
                ->url($this->statUrl($settingsEditUrl))
                ->icon(Maintenance::first()->is_active ? 'heroicon-o-shield-exclamation' : 'heroicon-o-check-circle')
                ->description(Maintenance::first()->is_active ? __('Maintenance Mode') : __('Website is Live'))
                ->color(Maintenance::first()->is_active ? 'warning' : 'success')
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),

            // Profile Status
            Stat::make(
                __('Profile Status'),
                Profile::where('is_open_to_work', true)->count() > 0 ? __('Open to Work') : __('Not Available')
            )
                ->icon('heroicon-o-identification')
                ->url($this->statUrl(ProfileResource::getUrl('index')))
                ->description(Profile::first()?->job_position ?? __('No Position Set'))
                ->color(Profile::where('is_open_to_work', true)->count() > 0 ? 'success' : 'gray')
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),

            // Blog Stats
            Stat::make(
                __('Blog Posts'),
                (string) Page::where('style', 'blog')->where('is_active', true)->count()
            )
                ->icon('heroicon-o-document-text')
                ->url($this->statUrl(PostResource::getUrl('index')))
                ->description(Category::where('is_blog', true)->where('is_active', true)->count().' '.__('Categories'))
                ->descriptionIcon('heroicon-m-hashtag')
                ->color('info')
                ->chart(Post::where('is_active', true)->pluck('id')->toArray())
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),

            // Newsletter Stats (Enhanced)
            Stat::make(
                __('Newsletter'),
                (string) Newsletter::counter()
            )
                ->icon('heroicon-o-megaphone')
                ->url($this->statUrl(NewsletterResource::getUrl('index')))
                ->description(__('Total Subscribers'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart(Newsletter::chartSubscribers())
                ->color('info')
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),

            // Inbox Stats (Enhanced)
            Stat::make(
                __('Messages'),
                (string) Mail::where('is_read', false)->where('is_sent', '=', false)->count()
            )
                ->url($this->statUrl(MailResource::getUrl('index')))
                ->icon('heroicon-o-inbox-stack')
                ->description(Mail::where('is_important', true)->count().' '.__('Important'))
                ->descriptionIcon('heroicon-m-star')
                ->chart(Mail::chartInbox())
                ->color('warning')
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),

            // Projects Stats (Enhanced)
            Stat::make(
                __('Projects'),
                (string) Project::where('is_active', true)->count()
            )
                ->icon('heroicon-o-rocket-launch')
                ->url($this->statUrl(ProjectResource::getUrl('index')))
                ->description(Category::where('is_project', true)->where('is_active', true)->count().' '.__('Categories'))
                ->descriptionIcon('heroicon-m-squares-2x2')
                ->color('success')
                ->chart(Project::where('is_active', true)->pluck('id')->toArray())
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),

            // Chatbox Status
            Stat::make(
                __('Chatbox'),
                Chatbox::first()?->visible ? __('Online') : __('Offline')
            )
                ->icon('heroicon-o-chat-bubble-left-right')
                ->url($this->statUrl($settingsChatboxUrl))
                ->description('+'.env('MOBILE_COUNTRY_CODE', '').' '.(Chatbox::first()?->telephone ?? __('Not Set')))
                ->color(Chatbox::first()?->visible ? 'success' : 'gray')
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),

            // GitHub Repositories
            Stat::make(
                __('GitHub Repositories'),
                Setting::first()?->config['github_is_active'] ?? false ? __('Active') : __('Inactive')
            )
                ->icon('heroicon-o-code-bracket')
                ->url($this->statUrl($settingsEditUrl))
                ->description('@'.(Setting::first()?->config['github_username'] ?? env('GITHUB_USERNAME', 'username')))
                ->color(Setting::first()?->config['github_is_active'] ?? false ? 'success' : 'gray')
                ->extraAttributes([
                    'class' => 'cursor-pointer transition-all hover:scale-101',
                ]),
        ];
    }
}

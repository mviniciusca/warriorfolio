<?php

namespace App\Filament\Widgets;

use App\Models\Setting;
use Filament\Facades\Filament;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class NotificationsWidget extends Widget
{
    protected static string $view = 'filament.widgets.notifications-widget';

    protected int|string|array $columnSpan = 'full';

    public function dismissNotification($id)
    {
        $user = Filament::auth()->user();
        $dismissedNotifications = Cache::get('user_'.$user->id.'_dismissed_notifications', []);
        $dismissedNotifications[] = $id;
        Cache::put('user_'.$user->id.'_dismissed_notifications', $dismissedNotifications, now()->addDays(30));

        $this->dispatch('refresh');
    }

    protected function getViewData(): array
    {
        return [
            'notifications' => $this->notifications(),
        ];
    }

    public function notifications()
    {
        $notifications = [];
        $user = Filament::auth()->user();

        if (empty(config('mail.mailers.smtp.host')) || empty(env('SMTP_SERVICES'))) {
            $notifications[] = [
                'id'      => 'smtp-missing',
                'title'   => 'SMTP Service Disabled',
                'message' => 'Configure the SMTP to allow email sending from the system.',
                'time'    => now()->diffForHumans(),
                'icon'    => 'heroicon-o-exclamation-circle',
                'color'   => 'warning',
                'url'     => null,
            ];
        }

        if (Hash::check('password', $user->password)) {
            $notifications[] = [
                'id'      => 'default-password',
                'title'   => 'Default Password Detected',
                'message' => 'For security reasons, change your default password immediately.',
                'time'    => now()->diffForHumans(),
                'icon'    => 'heroicon-o-shield-exclamation',
                'color'   => 'danger',
                'url'     => route('filament.admin.resources.settings.edit-security', Setting::query()->value('id')),
            ];
        }

        try {
            $dismissedNotifications = Cache::get('user_'.$user->id.'_dismissed_notifications', []);
        } catch (\Exception $e) {
            $dismissedNotifications = [];
        }

        if (! empty($dismissedNotifications)) {
            return collect($notifications)->filter(function ($notification) use ($dismissedNotifications) {
                return ! in_array($notification['id'], $dismissedNotifications);
            });
        }

        return collect($notifications);
    }
}

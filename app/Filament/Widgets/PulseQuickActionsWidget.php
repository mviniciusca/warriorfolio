<?php

namespace App\Filament\Widgets;

use App\Filament\Pages\Dashboard;
use App\Filament\Resources\PageResource;
use App\Filament\Resources\PostResource;
use App\Filament\Resources\ProfileResource;
use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\SettingResource;
use App\Models\Maintenance;
use App\Models\Setting;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class PulseQuickActionsWidget extends Widget
{
    protected static string $view = 'filament.widgets.pulse-quick-actions';

    protected static bool $isDiscovered = false;

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public bool $maintenanceActive = false;

    public function mount(): void
    {
        $this->maintenanceActive = (bool) Maintenance::query()->value('is_active');
    }

    public function toggleMaintenance(): void
    {
        $maintenance = Maintenance::query()->first();

        if ($maintenance === null) {
            Notification::make()
                ->title(__('Maintenance settings were not found.'))
                ->danger()
                ->send();

            return;
        }

        $maintenance->update(['is_active' => ! $maintenance->is_active]);
        $maintenance->refresh();
        $this->maintenanceActive = (bool) $maintenance->is_active;

        Notification::make()
            ->title(
                $this->maintenanceActive
                    ? __('Maintenance mode is now ON.')
                    : __('Maintenance mode is now OFF. Site is live.')
            )
            ->success()
            ->send();
    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        $userId = filament()->auth()->id();

        $setting = Setting::query()->first(['id', 'config']);
        $settingId = $setting?->id;
        $githubSettingsUrl = null;
        if ($settingId !== null && $settingId !== '') {
            $githubSettingsUrl = SettingResource::getUrl('edit', ['record' => $settingId])
                .'?id='
                .rawurlencode('settings_tabs-api-keys-integrations-tab');
        }

        $githubUsername = data_get($setting?->config, 'github_username');

        return [
            'createProjectUrl' => ProjectResource::getUrl('create'),
            'createPageUrl' => PageResource::getUrl('create'),
            'createNoteUrl' => PostResource::getUrl('create'),
            'editProfileUrl' => $userId
                ? ProfileResource::getUrl('edit', ['record' => $userId])
                : null,
            'editSocialUrl' => $userId
                ? ProfileResource::getUrl('edit-social-network', ['record' => $userId])
                : null,
            'maintenanceActive' => $this->maintenanceActive,
            'moduleVisibilityUrl' => Dashboard::getUrl().'#pulse-core-modules',
            'githubSettingsUrl' => $githubSettingsUrl,
            'githubUsername' => is_string($githubUsername) && $githubUsername !== '' ? $githubUsername : null,
        ];
    }
}

<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function getNavigationLabel(): string
    {
        return __('Application Settings');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Application Settings');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Manager your application, Core Status and SEO.');
    }
}

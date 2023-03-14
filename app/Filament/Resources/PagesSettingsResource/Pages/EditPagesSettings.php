<?php

namespace App\Filament\Resources\PagesSettingsResource\Pages;

use App\Filament\Resources\PagesSettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPagesSettings extends EditRecord
{
    protected static string $resource = PagesSettingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

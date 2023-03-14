<?php

namespace App\Filament\Resources\PagesSettingsResource\Pages;

use App\Filament\Resources\PagesSettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPagesSettings extends ListRecords
{
    protected static string $resource = PagesSettingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

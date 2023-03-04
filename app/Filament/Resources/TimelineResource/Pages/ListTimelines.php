<?php

namespace App\Filament\Resources\TimelineResource\Pages;

use App\Filament\Resources\TimelineResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimelines extends ListRecords
{
    protected static string $resource = TimelineResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

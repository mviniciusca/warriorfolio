<?php

namespace App\Filament\Resources\Hero\WelcomeResource\Pages;

use App\Filament\Resources\Hero\WelcomeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWelcomes extends ListRecords
{
    protected static string $resource = WelcomeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

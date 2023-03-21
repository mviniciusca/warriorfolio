<?php

namespace App\Filament\Resources\Hero\WelcomeResource\Pages;

use App\Filament\Resources\Hero\WelcomeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWelcome extends EditRecord
{
    protected static string $resource = WelcomeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

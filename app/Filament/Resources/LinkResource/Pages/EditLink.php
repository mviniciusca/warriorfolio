<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Filament\Resources\LinkResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLink extends EditRecord
{
    protected static string $resource = LinkResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

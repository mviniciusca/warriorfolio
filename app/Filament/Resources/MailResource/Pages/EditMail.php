<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMail extends EditRecord
{
    protected static string $resource = MailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

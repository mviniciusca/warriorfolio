<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMails extends ListRecords
{
    protected static string $resource = MailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

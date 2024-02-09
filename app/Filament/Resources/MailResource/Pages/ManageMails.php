<?php

namespace App\Filament\Resources\MailResource\Pages;

use Filament\Actions;
use Filament\Pages\Page;
use App\Filament\Resources\MailResource;
use Filament\Resources\Pages\ManageRecords;

class ManageMails extends ManageRecords
{
    protected static string $resource = MailResource::class;
    protected static ?string $title = '';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

}

<?php

namespace App\Filament\Resources\Project\TagResource\Pages;

use App\Filament\Resources\Project\TagResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTags extends ListRecords
{
    protected static string $resource = TagResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
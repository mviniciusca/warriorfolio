<?php

namespace App\Filament\Resources\PageCommentResource\Pages;

use App\Filament\Resources\PageCommentResource;
use Filament\Resources\Pages\ListRecords;

class ListPageComments extends ListRecords
{
    protected static string $resource = PageCommentResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}

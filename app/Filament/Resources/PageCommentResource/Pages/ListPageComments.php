<?php

namespace App\Filament\Resources\PageCommentResource\Pages;

use App\Filament\Resources\PageCommentResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListPageComments extends ListRecords
{
    protected static string $resource = PageCommentResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Comments');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Moderate thread replies on your pages. Approve, reply or remove spam from one place.');
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}

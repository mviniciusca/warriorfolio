<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\SectionResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListSections extends ListRecords
{
    protected static string $resource = SectionResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Sections');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Reusable layout sections for the builder. Edit each row to change visibility, copy and styling.');
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}

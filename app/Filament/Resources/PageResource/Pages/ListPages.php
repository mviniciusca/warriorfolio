<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Pages');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Create and edit site pages with the builder. Notes and portfolio projects are managed from their own areas.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('New Page'))
                ->icon('heroicon-o-document-plus')
                ->size('sm'),
        ];
    }
}

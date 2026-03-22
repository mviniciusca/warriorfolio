<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Categories');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Group Notes and Projects under shared categories for navigation and filters.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('New Category'))
                ->icon('heroicon-o-tag')
                ->size('sm'),
        ];
    }
}

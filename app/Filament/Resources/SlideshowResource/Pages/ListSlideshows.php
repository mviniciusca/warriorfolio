<?php

namespace App\Filament\Resources\SlideshowResource\Pages;

use App\Filament\Resources\SlideshowResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSlideshows extends ListRecords
{
    protected static string $resource = SlideshowResource::class;
    protected static ?string $title = 'Core Sliders';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

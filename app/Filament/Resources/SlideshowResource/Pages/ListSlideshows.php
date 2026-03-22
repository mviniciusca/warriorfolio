<?php

namespace App\Filament\Resources\SlideshowResource\Pages;

use App\Filament\Resources\SlideshowResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListSlideshows extends ListRecords
{
    protected static string $resource = SlideshowResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Core Sliders');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Image carousels reused across the site. Add slides, timing and display options.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('New Slideshow'))
                ->icon('heroicon-o-photo')
                ->size('sm'),
        ];
    }
}

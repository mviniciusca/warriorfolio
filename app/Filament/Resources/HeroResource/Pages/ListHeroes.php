<?php

namespace App\Filament\Resources\HeroResource\Pages;

use App\Filament\Resources\HeroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListHeroes extends ListRecords
{
    protected static string $resource = HeroResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Hero Sections');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Above-the-fold blocks: headings, CTAs, media and sliders for your pages.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('New Hero'))
                ->icon('heroicon-o-sparkles')
                ->size('sm'),
        ];
    }
}

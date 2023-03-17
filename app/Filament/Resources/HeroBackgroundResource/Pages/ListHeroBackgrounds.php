<?php

namespace App\Filament\Resources\HeroBackgroundResource\Pages;

use App\Filament\Resources\HeroBackgroundResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeroBackgrounds extends ListRecords
{
    protected static string $resource = HeroBackgroundResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

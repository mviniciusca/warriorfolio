<?php

namespace App\Filament\Resources\HeroBackgroundResource\Pages;

use App\Filament\Resources\HeroBackgroundResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroBackground extends EditRecord
{
    protected static string $resource = HeroBackgroundResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

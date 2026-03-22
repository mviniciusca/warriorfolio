<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfileResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Profiles');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Overview of user profiles, roles and public profile flags.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('New Profile'))
                ->icon('heroicon-o-user-plus')
                ->size('sm'),
        ];
    }
}

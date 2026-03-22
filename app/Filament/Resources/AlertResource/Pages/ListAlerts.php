<?php

namespace App\Filament\Resources\AlertResource\Pages;

use App\Filament\Resources\AlertResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListAlerts extends ListRecords
{
    protected static string $resource = AlertResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Alerts');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Site-wide notices and banners. Create, schedule visibility and dismiss behaviour from here.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('New Alert'))
                ->icon('heroicon-o-bell')
                ->size('sm'),
        ];
    }
}

<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Support\Htmlable;

class ManageCustomers extends ManageRecords
{
    protected static string $resource = CustomerResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Customers');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Track people and companies: contact details and notes in one place.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('New Customer'))
                ->icon('heroicon-o-building-office')
                ->size('sm'),
        ];
    }
}

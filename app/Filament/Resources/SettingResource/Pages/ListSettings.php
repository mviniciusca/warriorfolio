<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('Application Overview');
    }

    public function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                TextColumn::make('application.name')
                    ->label(__('Application')),
                TextColumn::make('user.name')
                    ->label(__('User')),
                IconColumn::make('maintenance.is_discovery')
                    ->label(__('Discovery'))
                    ->alignCenter()
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->icon('heroicon-o-globe-alt')
                    ->boolean(),
                IconColumn::make('maintenance.is_active')
                    ->alignCenter()
                    ->label(__('Maintenance'))
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->falseIcon('heroicon-o-server')
                    ->trueIcon('heroicon-o-wrench')
                    ->boolean(),
            ]);
    }
}

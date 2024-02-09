<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                TextColumn::make('name')
                    ->label('Application Name'),
                TextColumn::make('user.name')
                    ->label('Manager'),
                IconColumn::make('maintenance.is_discovery')
                    ->label(__('Discovery Mode'))
                    ->alignCenter()
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->icon('heroicon-o-globe-alt')
                    ->boolean(),
                IconColumn::make('maintenance.is_active')
                    ->alignCenter()
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->falseIcon('heroicon-o-server')
                    ->trueIcon('heroicon-o-wrench')
                    ->boolean(),
            ]);
    }
}

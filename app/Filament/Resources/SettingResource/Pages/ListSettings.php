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
                TextColumn::make('user.id')
                    ->label('User Name'),
                IconColumn::make('maintenance.is_discovery')
                    ->alignCenter()
                    ->label('Discovery Mode')
                    ->icon('heroicon-o-command-line')
                    ->boolean(),
                IconColumn::make('maintenance.is_active')
                    ->alignCenter()
                    ->label('Maintenance')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->boolean(),
            ]);
    }
}

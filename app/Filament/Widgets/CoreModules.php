<?php

namespace App\Filament\Widgets;

use App\Models\Core;
use App\Models\Setting;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class CoreModules extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 0;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Core::query()->select()
            )
            ->striped()
            ->heading('Core Modules Status')
            ->emptyStateIcon('heroicon-o-cpu-chip')
            ->paginated(false)
            ->headerActions(
                [
                    ViewAction::make()
                        ->url(route('filament.admin.resources.settings.edit', Setting::query()->first()->id))
                        ->label('Settings')
                        ->icon('heroicon-o-arrow-up-right')
                        ->outlined()
                        ->size('xs'),
                ]
            )
            ->columns([
                IconColumn::make('about')
                    ->label('About')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('clients')
                    ->label('Clients')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('contact')
                    ->label('Contact')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('footer')
                    ->label('Footer')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('header')
                    ->label('Header')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('hero')
                    ->label('Hero')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('newsletter')
                    ->label('Newsletter')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('portfolio')
                    ->label('Portfolio')
                    ->alignCenter()
                    ->boolean(),
            ]);
    }
}

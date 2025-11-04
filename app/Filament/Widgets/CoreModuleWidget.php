<?php

namespace App\Filament\Widgets;

use App\Models\Core;
use App\Models\Setting;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class CoreModuleWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 6;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Core::query()->select()
            )
            ->striped()
            ->heading(__('Module Visibility'))
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
                CheckboxColumn::make('about')
                    ->label('About')
                    ->alignCenter(),
                CheckboxColumn::make('clients')
                    ->label('Clients')
                    ->alignCenter(),
                CheckboxColumn::make('contact')
                    ->label('Contact')
                    ->alignCenter(),
                CheckboxColumn::make('footer')
                    ->label('Footer')
                    ->alignCenter(),
                CheckboxColumn::make('header')
                    ->label('Header')
                    ->alignCenter(),
                CheckboxColumn::make('hero')
                    ->label('Hero')
                    ->alignCenter(),
                CheckboxColumn::make('newsletter')
                    ->label('Newsletter')
                    ->alignCenter(),
                CheckboxColumn::make('portfolio')
                    ->label('Portfolio')
                    ->alignCenter(),
            ]);
    }
}

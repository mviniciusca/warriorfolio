<?php

namespace App\Filament\Widgets;

use App\Models\Maintenance;
use App\Models\Setting;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class SystemStatusWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->striped()
            ->query(Maintenance::query()->select())
            ->emptyStateIcon('heroicon-o-server')
            ->heading(__('Maintenance & Security'))
            ->description(__('See the website status.'))
            ->paginated(false)
            ->headerActions(
                [
                    ViewAction::make()
                        ->url(route('filament.admin.resources.settings.edit-maintenance-section', Setting::first()))
                        ->label(__('Manager'))
                        ->icon('heroicon-o-arrow-up-right')
                        ->outlined()
                        ->size('xs'),
                ]
            )
            ->columns([
                IconColumn::make('is_active')
                    ->label(__('Maintenance Mode'))
                    ->alignCenter()
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->falseIcon('heroicon-o-server')
                    ->trueIcon('heroicon-o-wrench')
                    ->boolean(),
                IconColumn::make('is_discovery')
                    ->label(__('Discovery Mode'))
                    ->alignCenter()
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->icon('heroicon-o-globe-alt')
                    ->boolean(),
            ])->contentGrid([
                'md' => 3,
                'lg' => 4,
            ]);
    }
}

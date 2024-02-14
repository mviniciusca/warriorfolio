<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Setting;
use Filament\Tables\Table;
use App\Models\Maintenance;
use Filament\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Z3d0X\FilamentLogger\Resources\ActivityResource\Pages\ViewActivity;

class SystemStatus extends BaseWidget
{
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->striped()
            ->query(Maintenance::query()->select())
            ->emptyStateIcon('heroicon-o-server')
            ->paginated(false)
            ->headerActions(
                [
                    ViewAction::make()
                        ->url(route('filament.admin.resources.settings.edit-maintenance-section', Setting::first()))
                        ->label('View All')
                        ->icon('heroicon-o-arrow-up-right')
                        ->outlined()
                        ->size('xs'),
                ]
            )
            ->columns([
                IconColumn::make('is_discovery')
                    ->label(__('Discovery Mode'))
                    ->alignCenter()
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->icon('heroicon-o-globe-alt')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label(__('Maintenance Mode'))
                    ->alignCenter()
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->falseIcon('heroicon-o-server')
                    ->trueIcon('heroicon-o-wrench')
                    ->boolean(),
            ])->contentGrid([
                    'md' => 3,
                    'lg' => 4
                ]);
    }
}

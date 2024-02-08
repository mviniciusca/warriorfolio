<?php

namespace App\Filament\Widgets;

use App\Models\Maintenance;
use App\Models\Setting;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class SystemStatus extends BaseWidget
{
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(Maintenance::query()->select())
            ->emptyStateIcon('heroicon-o-server')
            ->paginated(false)
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

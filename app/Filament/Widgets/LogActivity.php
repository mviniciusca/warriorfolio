<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Spatie\Activitylog\Models\Activity as ActivityLogger;

class LogActivity extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 10;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                ActivityLogger::query()
                    ->select()
                    ->orderBy('created_at', 'desc')
                    ->take(5)
            )
            ->paginated(false)
            ->columns([
                TextColumn::make('log_name')
                    ->label('Log Name'),
                TextColumn::make('event')
                    ->label('Event'),
                TextColumn::make('description')
                    ->label('Causer ID'),
                TextColumn::make('created_at')
                    ->label('Created At'),
            ]);
    }
}

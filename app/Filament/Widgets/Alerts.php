<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Alert;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class Alerts extends BaseWidget
{
    protected static ?int $sort = 6;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Alert::query()
                    ->select()
                    ->where('is_active', true)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
            )
            ->striped()
            ->emptyStateIcon('heroicon-o-bell')
            ->paginated(false)
            ->heading('Active Alerts')
            ->columns([
                IconColumn::make('is_active')
                    ->boolean()
                    ->label(''),
                TextColumn::make('title')
                    ->label('Title'),
            ]);
    }
}

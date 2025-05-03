<?php

namespace App\Filament\Widgets;

use App\Models\Alert;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AlertWidget extends BaseWidget
{
    protected static ?int $sort = 6;

    protected int|string|array $columnSpan = 2;

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
            ->heading(__('Site Alerts'))
            ->headerActions(
                [
                    ViewAction::make()
                        ->url(route('filament.admin.resources.alerts.index'))
                        ->label(__('View All'))
                        ->icon('heroicon-o-arrow-up-right')
                        ->outlined()
                        ->size('xs'),
                ]
            )
            ->striped()
            ->emptyStateIcon('heroicon-o-bell')
            ->paginated(false)
            ->columns([
                IconColumn::make('is_active')
                    ->boolean()
                    ->label(''),
                TextColumn::make('title')
                    ->label('Title'),
            ]);
    }
}

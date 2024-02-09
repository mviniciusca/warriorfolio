<?php

namespace App\Filament\Widgets;

use App\Models\Mail;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestMails extends BaseWidget
{
    protected static ?string $heading = 'Inbox';
    protected static ?int $sort = 1;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Mail::query()
                    ->latest()
                    ->limit(5)
            )
            ->striped()
            ->emptyStateIcon('heroicon-o-inbox')
            ->paginated(false)
            ->searchable(false)
            ->columns([
                TextColumn::make('name')
                    ->limit(16)
                    ->label(__('From')),
                TextColumn::make('subject')
                    ->limit(40)
                    ->label(__('Subject')),
            ]);
    }
}

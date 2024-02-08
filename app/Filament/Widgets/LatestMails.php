<?php

namespace App\Filament\Widgets;

use App\Models\Mail;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestMails extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int|string|array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Mail::query()
                    ->latest()
                    ->limit(5)
            )
            ->paginated(false)
            ->searchable(false)
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name')),
                TextColumn::make('subject')
                    ->label(__('Subject')),
            ]);
    }
}

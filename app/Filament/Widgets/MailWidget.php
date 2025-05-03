<?php

namespace App\Filament\Widgets;

use App\Models\Mail;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class MailWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected static ?string $heading = 'Recent Messages';

    protected static ?string $description = 'Your latest unread messages';

    protected int $limit = 5;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Mail::query()
                    ->where('is_read', '=', false)
                    ->where('is_sent', '=', false)
                    ->latest('id')
                    ->limit($this->limit)
            )
            ->recordUrl(fn (Mail $record) => route('filament.admin.resources.mails.view', $record->id))
            ->headerActions([
                ViewAction::make()
                    ->url(route('filament.admin.resources.mails.index'))
                    ->label(__('View All'))
                    ->icon('heroicon-o-arrow-up-right')
                    ->outlined()
                    ->size('xs'),
            ])
            ->contentGrid([
                'md' => 1,
            ])
            ->columns([
                TextColumn::make('name')
                    ->label(__('From'))
                    ->searchable()
                    ->sortable()
                    ->description(fn (Mail $record): string => $record->email)
                    ->icon('heroicon-m-user'),

                TextColumn::make('subject')
                    ->label(__('Subject'))
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->icon(fn (Mail $record) => $record->is_important ? 'heroicon-m-star' : null)
                    ->iconColor('warning')
                    ->description(fn (Mail $record): string => \Illuminate\Support\Str::limit($record->body, 60)),

                TextColumn::make('created_at')
                    ->label(__('Received'))
                    ->sortable()
                    ->date('d M, H:i')
                    ->alignRight(),
            ])
            ->emptyStateIcon('heroicon-o-inbox')
            ->paginated(false)
            ->striped();
    }
}

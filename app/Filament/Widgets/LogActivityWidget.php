<?php

namespace App\Filament\Widgets;

use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Spatie\Activitylog\Models\Activity as ActivityLogger;
use Z3d0X\FilamentLogger\Resources\ActivityResource;

class LogActivityWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 10;

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Recent activity'))
            ->description(
                __(
                    'Latest changes recorded in the activity log (resources edited, logins, notifications, etc.). Follow a row to see context or open the full log for filtering and export.'
                )
            )
            ->query(
                ActivityLogger::query()
                    ->select()
                    ->orderBy('created_at', 'desc')
                    ->take(5)
            )
            ->contentGrid([
                'md' => 1,
            ])
            ->headerActions([
                ViewAction::make()
                    ->url(ActivityResource::getUrl('index'))
                    ->label(__('View All'))
                    ->icon('heroicon-o-arrow-up-right')
                    ->outlined()
                    ->size('xs'),
            ])
            ->columns([
                TextColumn::make('log_name')
                    ->label(__('Type'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Resource' => 'success',
                        'Access' => 'danger',
                        'Notification' => 'info',
                        default => 'gray',
                    }),

                TextColumn::make('description')
                    ->label(__('Action'))
                    ->description(fn (ActivityLogger $record): string => $record->subject_type ?? '')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('causer.name')
                    ->label(__('User'))
                    ->default('System')
                    ->icon('heroicon-m-user'),

                TextColumn::make('created_at')
                    ->label(__('When'))
                    ->dateTime('M d, H:i')
                    ->sortable()
                    ->alignRight(),
            ])
            ->striped()
            ->paginated(false);
    }
}

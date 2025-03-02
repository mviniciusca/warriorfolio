<?php

namespace App\Filament\Widgets;

use App\Models\Profile;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class ProfileStatus extends BaseWidget
{
    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Profile::query(),
            )
            ->heading(__('Profile Overview'))
            ->description(__('A quick view about your profile.'))
            ->striped()
            ->headerActions(
                [
                    ViewAction::make()
                        ->url(route('filament.admin.resources.profiles.edit', Auth::user()->id))
                        ->label('Manager')
                        ->icon('heroicon-o-arrow-up-right')
                        ->outlined()
                        ->size('xs'),
                ]
            )
            ->emptyStateIcon('heroicon-o-user')
            ->paginated(false)
            ->heading('Profile Status')
            ->columns([
                TextColumn::make('user.name')
                    ->label(__('Name')),
                TextColumn::make('job_position')
                    ->limit(15)
                    ->label(__('Job Position')),
                ToggleColumn::make('is_open_to_work')
                    ->label(__('Open to Work'))
                    ->alignCenter(),
                ToggleColumn::make('is_downloadable')
                    ->label(__('Downl. Resume'))
                    ->alignCenter(),
            ]);
    }
}

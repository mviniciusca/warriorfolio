<?php

namespace App\Filament\Widgets;

use App\Models\Profile;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class ProfileWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Profile::query()
                    ->with(['user'])
                    ->where('user_id', Auth::id())
            )
            ->heading(__('Profile Overview'))
            ->description(__('Quick overview of your professional profile'))
            ->striped()
            ->headerActions([
                ViewAction::make()
                    ->url(route('filament.admin.resources.profiles.edit', Auth::user()->id))
                    ->label(__('Edit Profile'))
                    ->icon('heroicon-o-pencil-square')
                    ->outlined()
                    ->size('sm'),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->columns([
                TextColumn::make('user.name')
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-user'),

                TextColumn::make('job_position')
                    ->label(__('Position'))
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-briefcase'),

                TextColumn::make('company')
                    ->label(__('Company'))
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-building-office'),

                TextColumn::make('localization')
                    ->label(__('Location'))
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-map-pin'),

                TextColumn::make('public_email')
                    ->label(__('Public Email'))
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-envelope'),

                ToggleColumn::make('is_open_to_work')
                    ->label(__('Open to Work'))
                    ->alignCenter()
                    ->onColor('success')
                    ->offColor('danger'),

                ToggleColumn::make('is_downloadable')
                    ->label(__('Resume Available'))
                    ->alignCenter()
                    ->onColor('success')
                    ->offColor('danger'),
            ])
            ->defaultSort('user.name', 'asc')
            ->emptyStateIcon('heroicon-o-user')
            ->emptyStateHeading(__('No profile information'))
            ->emptyStateDescription(__('Start by adding your professional information'))
            ->paginated(false);
    }
}

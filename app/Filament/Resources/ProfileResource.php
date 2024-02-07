<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Profile;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProfileResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProfileResource\RelationManagers;
use Awcodes\Curator\Components\Tables\CuratorColumn;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static function getNavigationLabel(): string
    {
        return __('Profile');
    }
    public static function getNavigationGroup(): ?string
    {
        return __('App Sections');
    }
    protected static ?int $navigationSort = 0;

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\EditProfile::class,
            Pages\EditSocialNetwork::class,
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                CuratorColumn::make('avatar')
                    ->size(50)
                    ->circular()
                    ->label('Photo')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Name'),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('job_position')
                    ->label('Job Position'),
                Tables\Columns\IconColumn::make('is_open_to_work')
                    ->label('Open to Work')
                    ->boolean()
                    ->alignCenter()
                    ->icon(function (Profile $record) {
                        return $record->is_open_to_work ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle';
                    }),
                Tables\Columns\IconColumn::make('is_downloadable')
                    ->label('Downloadable Resume')
                    ->boolean()
                    ->alignCenter()
                    ->icon(function (Profile $record) {
                        return $record->is_downloadable ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle';
                    }),

            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
            'edit-social-network' => Pages\EditSocialNetwork::route('/{record}/edit-social-network'),
        ];
    }
}

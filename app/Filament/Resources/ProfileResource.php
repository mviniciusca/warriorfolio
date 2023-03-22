<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Profile;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Awcodes\Curator\Facades\Curator;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProfileResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProfileResource\RelationManagers;
use Awcodes\Curator\Components\Modals\CuratorCuration;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Components\Grid;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon    = 'heroicon-o-collection';
    protected static ?string $navigationLabel   = 'Profile';
    protected static ?string $navigationGroup   = 'Profile';
    protected static ?string $slug              = 'profile-settings';
    protected static ?string $modelLabel        = 'Profile';

    public static function form(Form $form): Form
    {
           return $form
            ->schema([
                    CuratorPicker::make('picture')
                    ->label('Public Picture')
                    ->columnSpan(2),
                   Forms\Components\TextInput::make('name')
                    ->columnSpan(1)
                    ->label('Public Name')
                    ->required(),
                    Forms\Components\TextInput::make('job_position')
                    ->columnSpan(1)
                    ->label('Job Position or Title'),
                    Forms\Components\TextInput::make('localization')
                    ->columnSpan(1)
                    ->label('Localization'),
                    Forms\Components\TextInput::make('skills')
                    ->columnSpan(1)
                    ->label('Skills *separeted by commas*'),
                    Forms\Components\TextInput::make('github_link')
                    ->columnSpan(1)
                    ->label('Github Profile'),
                    Forms\Components\TextInput::make('linkedin_link')
                    ->columnSpan(1)
                    ->label('LinkedIn Profile'),
                    Forms\Components\TextInput::make('twitter_link')
                    ->columnSpan(1)
                    ->label('Twitter Profile'),
                    Forms\Components\TextInput::make('medium_link')
                    ->columnSpan(1)
                    ->label('Medium Profile'),
                    Forms\Components\TextInput::make('facebook_link')
                    ->columnSpan(1)
                    ->label('Facebook Profile'),
                    Forms\Components\TextInput::make('instagram_link')
                    ->columnSpan(1)
                    ->label('Instagram Profile'),
                    Forms\Components\TextInput::make('dribbble_link')
                    ->columnSpan(1)
                    ->label('Dribbble Profile'),
                    Forms\Components\MarkdownEditor::make('about')
                    ->columnSpan(2)
                    ->label('Bio'),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
        ];
    }
}

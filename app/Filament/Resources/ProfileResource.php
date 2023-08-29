<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon    = 'heroicon-o-user';
    protected static ?string $navigationLabel   = 'Your Profile';
    protected static ?string $navigationGroup   = 'Profile';
    protected static ?string $slug              = 'profiles';
    protected static ?string $modelLabel        = 'Profile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('localization'),
                Forms\Components\TextInput::make('job_position'),
                Forms\Components\FileUpload::make('picture'),
                Forms\Components\Textarea::make('about')->label('About (html allowed)'),
                Forms\Components\TextInput::make('skills'),
                Forms\Components\TextInput::make('github_link'),
                Forms\Components\TextInput::make('twitter_link'),
                Forms\Components\TextInput::make('linkedin_link'),
                Forms\Components\TextInput::make('dribbble_link'),
                Forms\Components\TextInput::make('instagram_link'),
                Forms\Components\TextInput::make('facebook_link'),
                Forms\Components\TextInput::make('medium_link'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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

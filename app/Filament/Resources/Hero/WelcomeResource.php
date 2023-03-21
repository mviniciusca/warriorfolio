<?php

namespace App\Filament\Resources\Hero;

use App\Filament\Resources\Hero\WelcomeResource\Pages;
use App\Filament\Resources\Hero\WelcomeResource\RelationManagers;
use App\Models\Hero\Welcome;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WelcomeResource extends Resource
{
    protected static ?string $model = Welcome::class;

    protected static ?string $navigationIcon    = 'heroicon-o-pencil';
    protected static ?string $navigationLabel   = 'Welcome Text';
    protected static ?string $navigationGroup   = 'Hero Section';
    protected static ?string $slug              = 'welcome-text';
    protected static ?string $modelLabel        = 'Welcome Text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextInput::make('subtitle')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('subtitle'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
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
            'index' => Pages\ListWelcomes::route('/'),
            'create' => Pages\CreateWelcome::route('/create'),
            'edit' => Pages\EditWelcome::route('/{record}/edit'),
        ];
    }
}

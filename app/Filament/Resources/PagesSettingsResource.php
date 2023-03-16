<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PagesSettingsResource\Pages;
use App\Filament\Resources\PagesSettingsResource\RelationManagers;
use App\Models\PagesSettings;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PagesSettingsResource extends Resource
{
    protected static ?string $model = PagesSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('about_title')
                    ->label('About Me Section Title'),
                Forms\Components\TextInput::make('about_description')
                    ->label('About Me Section Description'),
                Forms\Components\TextInput::make('contact_title')
                    ->label('Contact Section Title'),
                Forms\Components\TextInput::make('contact_description')
                    ->label('Contact Section Description'),
                Forms\Components\TextInput::make('portfolio_title')
                    ->label('Portfolio Section Title'),
                Forms\Components\TextInput::make('portfolio_description')
                    ->label('Portfolio Section Description'),
                Forms\Components\TextInput::make('customers_title')
                    ->label('Customers Section Title'),
                Forms\Components\TextInput::make('customers_description')
                    ->label('Customers Section Description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('about_title'),
                Tables\Columns\TextColumn::make('about_description'),
                Tables\Columns\TextColumn::make('contact_title'),
                Tables\Columns\TextColumn::make('contact_description'),
                Tables\Columns\TextColumn::make('portfolio_title'),
                Tables\Columns\TextColumn::make('portfolio_description'),
                Tables\Columns\TextColumn::make('customers_title'),
                Tables\Columns\TextColumn::make('customers_description'),
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
            'index' => Pages\ListPagesSettings::route('/'),
            'create' => Pages\CreatePagesSettings::route('/create'),
            'edit' => Pages\EditPagesSettings::route('/{record}/edit'),
        ];
    }
}
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $slug              = 'settings';
    protected static ?string $modelLabel        = 'Settings';
    protected static ?string $navigationGroup   = 'App Settings';
    protected static ?string $navigationLabel   = 'Settings';
    protected static ?string $navigationIcon    = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Forms\Components\TextInput::make('app_name')
                    ->label('App Name'),
                Forms\Components\TextInput::make('app_logo')
                    ->label('App Logo'),
                Forms\Components\TextInput::make('app_favicon')
                    ->label('App Favicon'),
                Forms\Components\TextInput::make('app_description')
                     ->label('App Description'),
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

                Tables\Columns\TextColumn::make('app_name'),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}

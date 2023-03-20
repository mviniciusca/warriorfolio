<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroBackgroundResource\Pages;
use App\Filament\Resources\HeroBackgroundResource\RelationManagers;
use App\Models\HeroBackground;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroBackgroundResource extends Resource
{
    protected static ?string $model = HeroBackground::class;

    protected static ?string $navigationIcon    = 'heroicon-o-camera';
    protected static ?string $navigationLabel   = 'Background';
    protected static ?string $navigationGroup   = 'Hero Section';
    protected static ?string $slug              = 'hero-background';
    protected static ?string $modelLabel        = 'Hero Background';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                CuratorPicker::make('background_image')
                    ->label('Background Image')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Activated')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('background_image'),
                Tables\Columns\TextColumn::make('title'),
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
            'index' => Pages\ListHeroBackgrounds::route('/'),
            'create' => Pages\CreateHeroBackground::route('/create'),
            'edit' => Pages\EditHeroBackground::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LayoutResource\Pages;
use App\Filament\Resources\LayoutResource\RelationManagers;
use App\Models\Layout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LayoutResource extends Resource
{
    protected static ?string $model = Layout::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('setting_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('hero_section_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('hero_section_subtitle_text')
                    ->maxLength(255),
                Forms\Components\TextInput::make('portfolio_section_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('portfolio_section_subtitle_text')
                    ->maxLength(255),
                Forms\Components\TextInput::make('about_section_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('about_section_subtitle_text')
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_section_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_section_subtitle_text')
                    ->maxLength(255),
                Forms\Components\TextInput::make('clients_section_text')
                    ->maxLength(255),
                Forms\Components\TextInput::make('clients_section_subtitle_text')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('setting_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hero_section_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hero_section_subtitle_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('portfolio_section_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('portfolio_section_subtitle_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('about_section_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('about_section_subtitle_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_section_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_section_subtitle_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('clients_section_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('clients_section_subtitle_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListLayouts::route('/'),
            'create' => Pages\CreateLayout::route('/create'),
            'edit' => Pages\EditLayout::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\Project;

use App\Filament\Resources\Project\TagResource\Pages;
use App\Filament\Resources\Project\TagResource\RelationManagers;
use App\Models\Project\Tag;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon    = 'heroicon-o-collection';
    protected static ?string $navigationLabel   = 'Tags';
    protected static ?string $navigationGroup   = 'Portfolio';
    protected static ?string $slug              = 'projects/tags';
    protected static ?string $modelLabel        = 'Tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                ->label('Project Tag')
                ->columnSpan(1)
                ->required(),
                Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->columnSpan(5)
                ->required(),
                Forms\Components\TextInput::make('color')
                ->label('Tag Color')
                ->columnSpan(5),
                Forms\Components\MarkdownEditor::make('icon')
                ->columnSpan(12)
                ->label('Tag Icon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('color'),
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
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}

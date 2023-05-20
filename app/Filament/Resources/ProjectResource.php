<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use App\Models\Project\Tag;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon    = 'heroicon-o-collection';
    protected static ?string $navigationLabel   = 'Projects';
    protected static ?string $navigationGroup   = 'Portfolio';
    protected static ?string $slug              = 'projects';
    protected static ?string $modelLabel        = 'Project';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('cover')
                    ->columnSpanFull()
                    ->required(),
                    Forms\Components\TextInput::make('title')
                    ->required(),
                    Forms\Components\TextInput::make('slug')
                    ->required(),
                    Forms\Components\Select::make('tag_id')
                        ->label('Tag')
                        ->options(Tag::all()->sortBy('title')->pluck('title', 'id')),
                Forms\Components\TextInput::make('link'),
                Forms\Components\Textarea::make('about')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tag_id'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('cover'),
                Tables\Columns\TextColumn::make('link'),
                Tables\Columns\TextColumn::make('about'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}

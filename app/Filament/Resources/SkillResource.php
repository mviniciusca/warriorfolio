<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Filament\Resources\SkillResource\RelationManagers;
use App\Models\Skill;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;

    protected static ?string $navigationIcon    = 'heroicon-o-tag';
    protected static ?string $navigationLabel   = 'Skills';
    protected static ?string $navigationGroup   = 'Profile';
    protected static ?string $slug              = 'skills';
    protected static ?string $modelLabel        = 'Skill';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('skill_one'),
                Forms\Components\TextInput::make('skill_two'),
                Forms\Components\TextInput::make('skill_three'),
                Forms\Components\TextInput::make('skill_four'),
                Forms\Components\TextInput::make('skill_five'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('skill_one'),
                Tables\Columns\TextColumn::make('skill_two'),
                Tables\Columns\TextColumn::make('skill_three'),
                Tables\Columns\TextColumn::make('skill_four'),
                Tables\Columns\TextColumn::make('skill_five'),
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
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}

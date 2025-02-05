<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoteResource\Pages;
use App\Filament\Resources\NoteResource\RelationManagers;
use App\Models\Note;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NoteResource extends Resource
{
    protected static ?string $model = Note::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(5)
            ->schema([
                Group::make()
                    ->columnSpan(4)
                    ->schema([
                        Section::make(__('Notes'))
                            ->columns(2)
                            ->icon('heroicon-o-pencil')
                            ->description(__('Manager your notes here.'))
                            ->schema([
                                TextInput::make('title')
                                    ->prefixIcon('heroicon-o-pencil')
                                    ->required(),
                                TextInput::make('slug')
                                    ->required()
                                    ->prefixIcon('heroicon-o-link')
                                    ->suffix('.html')
                                    ->unique(Note::class, 'slug', null, true),
                                RichEditor::make('content.main')
                                    ->label(__('Content'))
                                    ->columnSpanFull(),
                                Toggle::make('settings.is_published')
                                    ->label(__('Published'))
                                    ->default(true),
                            ]),
                    ]),
                Group::make()
                    ->schema([
                        CuratorPicker::make('content.img_cover')
                            ->label(__('Cover')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index'  => Pages\ListNotes::route('/'),
            'create' => Pages\CreateNote::route('/create'),
            'edit'   => Pages\EditNote::route('/{record}/edit'),
        ];
    }
}

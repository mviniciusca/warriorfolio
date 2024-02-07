<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    public static function getNavigationGroup(): ?string
    {
        return __('App Sections');
    }
    public static function getNavigationLabel(): string
    {
        return __('Categories');
    }
    public static function getNavigationParentItem(): ?string
    {
        return __('Projects');
    }
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Category')
                    ->icon('heroicon-o-tag')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->reactive()
                            ->lazy()
                            ->label('Category Name')
                            ->maxLength(255),
                        Forms\Components\Select::make('parent_id')
                            ->relationship('parent', 'name')
                            ->searchable()
                            ->optionsLimit(5)
                            ->label('Parent Category')
                            ->nullable(),
                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->placeholder('generated automatically')
                            ->maxLength(255),
                        Forms\Components\ColorPicker::make('hex_color')
                            ->helperText('Select the category tag color')
                            ->label('Category Tag Color'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Category Visibility')
                            ->default(true)
                            ->inline(false)
                            ->required(),
                        Forms\Components\Textarea::make('icon')
                            ->label('SVG Icon')
                            ->placeholder('Place here the svg icon code: starts with <svg> and ends with </svg>')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('parent.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable(),
                Tables\Columns\ColorColumn::make('hex_color')
                    ->alignCenter()
                    ->label('Tag Color'),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->alignCenter()
                    ->label('Visible')
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                ])
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}

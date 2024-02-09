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
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;
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
    protected static ?string $recordTitleAttribute = 'name';
    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->name;
    }

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::where('is_active', true)->count() > 0) {
            return static::getModel()::where('is_active', true)->count();
        }
        return null;
    }


    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Category')
                    ->description('Create or edit categories for your projects.')
                    ->columns(3)
                    ->icon('heroicon-o-tag')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->helperText('Projects under this category will be visible to the public.')
                            ->default(true)
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->reactive()
                            ->lazy()
                            ->unique(ignoreRecord: true)
                            ->label('Category Name')
                            ->helperText('The name of the category.')
                            ->maxLength(255),
                        Forms\Components\Select::make('parent_id')
                            ->relationship('parent', 'name')
                            ->options(Category::all()->pluck('name', 'id'))
                            ->optionsLimit(10)
                            ->searchable()
                            ->searchable()
                            ->label('Parent Category (optional)')
                            ->helperText('Select a parent category if this is a sub-category.')
                            ->nullable(),
                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->placeholder('generated automatically')
                            ->helperText('The URL-friendly name of the category. This will be used in the URL of the category page.')
                            ->label('Category Slug (generated automatically)')
                            ->maxLength(255),
                        Forms\Components\ColorPicker::make('hex_color')
                            ->helperText('HEX color code (e.g. #FF0000) or color name (e.g. red)')
                            ->hexColor()
                            ->label('Category Tag Color (optional)'),
                        Forms\Components\TextInput::make('icon')
                            ->label('Ionicon Icon (optional)')
                            ->prefixIcon('heroicon-o-tag')
                            ->prefix('ion-icon')
                            ->helperText('Just the name of the icon'),
                    ]),
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
                    Tables\Actions\DeleteAction::make(),
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

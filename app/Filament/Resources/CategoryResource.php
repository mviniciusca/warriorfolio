<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

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
                Section::make(__('Category'))
                    ->description(__('Category of your Projects'))
                    ->columns(3)
                    ->icon('heroicon-o-tag')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label(__('Active'))
                            ->helperText(__('Projects under this category will be visible to the public.'))
                            ->default(true)
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->prefixIcon('heroicon-o-tag')
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->reactive()
                            ->lazy()
                            ->unique(ignoreRecord: true)
                            ->label(__('Category Name'))
                            ->helperText(__('The name of the category.'))
                            ->maxLength(255),
                        Forms\Components\Select::make('parent_id')
                            ->relationship('parent', 'name')
                            ->prefixIcon('heroicon-o-tag')
                            ->options(Category::all()->pluck('name', 'id'))
                            ->optionsLimit(10)
                            ->searchable()
                            ->label(__('Parent Category (optional)'))
                            ->helperText(__('Select a parent category if this is a sub-category.'))
                            ->nullable(),
                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->placeholder(__('generated automatically'))
                            ->helperText(__('The URL-friendly name of the category. This will be used in the URL of the category page.'))
                            ->label('Category Slug (generated automatically)')
                            ->maxLength(255),
                        Forms\Components\ColorPicker::make('hex_color')
                            ->helperText(__('HEX color code (e.g. #FF0000) or color name (e.g. red)'))
                            ->prefixIcon('heroicon-o-paint-brush')
                            ->hexColor()
                            ->label(__('Category Tag Color (optional)')),
                        Forms\Components\TextInput::make('icon')
                            ->label(__('Ionicon Icon (optional)'))
                            ->prefixIcon('heroicon-o-sparkles')
                            ->prefix('ion-icon')
                            ->helperText(__('Only name. See in https://ionic.io/ionicons')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ColorColumn::make('hex_color')
                    ->alignLeft()
                    ->label(__('Tag Color')),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label(__('Visible')),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label(__('Parent'))
                    ->default('---')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Category'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index'  => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit'   => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}

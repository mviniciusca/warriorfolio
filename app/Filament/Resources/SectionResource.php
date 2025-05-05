<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use Z3d0X\FilamentFabricator\Forms\Components\PageBuilder;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use Z3d0X\FilamentFabricator\View\ResourceSchemaSlot;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Core Features';

    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string
    {
        return __('Sections');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->maxLength(255)
                    ->unique(Section::class, 'slug', ignoreRecord: true),
                Forms\Components\Tabs::make('Section')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Settings')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\Toggle::make('is_active')
                                            ->label('Active')
                                            ->default(true)
                                            ->required(),
                                        Forms\Components\Toggle::make('is_coupled')
                                            ->label('Coupled')
                                            ->helperText('If enabled, this section will be coupled with the main layout')
                                            ->default(false)
                                            ->required(),
                                    ])
                                    ->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make('Content')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('content.title')
                                    ->label('Title')
                                    ->placeholder('Enter section title'),
                                Forms\Components\TextInput::make('content.subtitle')
                                    ->label('Subtitle')
                                    ->placeholder('Enter section subtitle'),
                                Forms\Components\Textarea::make('content.description')
                                    ->label('Description')
                                    ->placeholder('Enter section description')
                                    ->rows(4),
                                Forms\Components\TextInput::make('content.button_text')
                                    ->label('Button Text')
                                    ->placeholder('Enter button text'),
                                Forms\Components\TextInput::make('content.button_url')
                                    ->label('Button URL')
                                    ->placeholder('Enter button URL')
                                    ->url(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Blocks')
                            ->icon('heroicon-o-rectangle-group')
                            ->schema([
                                Group::make()->schema(FilamentFabricator::getSchemaSlot(ResourceSchemaSlot::BLOCKS_BEFORE)),

                                PageBuilder::make('blocks')
                                    ->label(__('filament-fabricator::page-resource.labels.blocks')),

                                Group::make()->schema(FilamentFabricator::getSchemaSlot(ResourceSchemaSlot::BLOCKS_AFTER)),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable()
                    ->label('Active'),
                Tables\Columns\IconColumn::make('is_coupled')
                    ->boolean()
                    ->sortable()
                    ->label('Coupled'),
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
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active')
                    ->placeholder('All sections')
                    ->trueLabel('Active sections')
                    ->falseLabel('Inactive sections'),
                Tables\Filters\TernaryFilter::make('is_coupled')
                    ->label('Coupled')
                    ->placeholder('All sections')
                    ->trueLabel('Coupled sections')
                    ->falseLabel('Uncoupled sections'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('name', 'asc');
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
            'index'  => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit'   => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}

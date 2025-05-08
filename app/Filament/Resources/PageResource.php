<?php

namespace App\Filament\Resources;

use App\Filament\Custom\PageBuilder;
use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use Z3d0X\FilamentFabricator\Models\Contracts\Page as PageContract;
use Z3d0X\FilamentFabricator\Resources\PageResource as ResourcesPageResource;

class PageResource extends ResourcesPageResource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function getNavigationGroup(): ?string
    {
        return __('Website Design');
    }

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::where('style', '!=', 'blog')->count() > 0) {
            return static::getModel()::where('style', '=', 'default')->count();
        }

        return null;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Page::query())
            ->columns([
                TextColumn::make('style')
                    ->label(__('Style'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'default' => 'primary',
                        'blog'    => 'success',
                        'project' => 'warning',
                        default   => 'gray',
                    })
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('title')
                    ->label(__('filament-fabricator::page-resource.labels.title'))
                    ->searchable()
                    ->limit(50)
                    ->sortable()
                    ->wrap(),

                TextColumn::make('url')
                    ->label(__('filament-fabricator::page-resource.labels.url'))
                    ->toggleable()
                    ->limit(25)
                    ->badge()
                    ->color('info')
                    ->getStateUsing(fn (?PageContract $record) => FilamentFabricator::getPageUrlFromId($record->id) ?: null)
                    ->url(fn (?PageContract $record) => FilamentFabricator::getPageUrlFromId($record->id) ?: null, true)
                    ->visible(config('filament-fabricator.routing.enabled')),

                TextColumn::make('layout')
                    ->label(__('filament-fabricator::page-resource.labels.layout'))
                    ->badge()
                    ->toggleable()
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label(__('Published'))
                    ->toggleable()
                    ->alignCenter()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('parent.title')
                    ->label(__('filament-fabricator::page-resource.labels.parent'))
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->formatStateUsing(fn ($state) => $state ?? '-')
                    ->url(fn (?PageContract $record) => filled($record->parent_id) ? PageResource::getUrl('edit', ['record' => $record->parent_id]) : null),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('style')
                    ->label(__('Style'))
                    ->options([
                        'default' => 'Default',
                        'blog'    => 'Blog',
                        'project' => 'Project',
                    ]),

                SelectFilter::make('is_active')
                    ->label(__('Status'))
                    ->options([
                        '1' => 'Published',
                        '0' => 'Draft',
                    ])
                    ->default('1'),

                SelectFilter::make('layout')
                    ->label(__('filament-fabricator::page-resource.labels.layout'))
                    ->options(FilamentFabricator::getLayouts()),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->visible(config('filament-fabricator.enable-view-page')),
                    EditAction::make()
                        ->url(fn (Page $record): string => match ($record->style) {
                            'blog'    => route('filament.admin.resources.posts.edit', ['record' => $record->id]),
                            'project' => route('filament.admin.resources.projects.edit', ['record' => $record->id]),
                            default   => PageResource::getUrl('edit', ['record' => $record])
                        }),
                    Action::make('visit')
                        ->label(__('filament-fabricator::page-resource.actions.visit'))
                        ->url(fn (?PageContract $record) => FilamentFabricator::getPageUrlFromId($record->id, true) ?: null)
                        ->icon('heroicon-o-arrow-top-right-on-square')
                        ->openUrlInNewTab()
                        ->color('success')
                        ->visible(config('filament-fabricator.routing.enabled')),
                ]),
            ])
            ->bulkActions([]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        TextInput::make('slug')
                            ->label(__('Slug'))
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->rules(['regex:/^[a-zA-Z0-9\-\/]+$/'])
                            ->helperText(__('This will be the URL of your page. Use / for homepage'))
                            ->columnSpan(1),

                        Select::make('layout')
                            ->label(__('Layout'))
                            ->options(FilamentFabricator::getLayouts())
                            ->required()
                            ->columnSpan(1),
                    ]),

                Tabs::make('Create Page')
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('Content')
                            ->icon('heroicon-o-cube')
                            ->schema([
                                PageBuilder::make('blocks')
                                    ->label(__('Page Builder'))
                                    ->blocks(FilamentFabricator::getPageBlocks())
                                    ->collapsible()
                                    ->collapsed()
                                    ->cloneable(),
                            ]),

                        Tabs\Tab::make('Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Section::make(__('Page Settings'))
                                    ->description(__('Configure page visibility and behavior'))
                                    ->icon('heroicon-o-cog')
                                    ->columns(2)
                                    ->schema([
                                        Toggle::make('is_active')
                                            ->label(__('Published'))
                                            ->helperText(__('Make this page visible to visitors'))
                                            ->default(true),

                                        Select::make('parent_id')
                                            ->label(__('Parent Page'))
                                            ->relationship('parent', 'title')
                                            ->searchable()
                                            ->hidden()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                    ])
                    ->persistTabInQueryString('id'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit'   => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}

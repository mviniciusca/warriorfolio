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
                TextColumn::make('title')
                    ->label(__('filament-fabricator::page-resource.labels.title'))
                    ->searchable()
                    ->limit(50)
                    ->sortable()
                    ->wrap(),

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

                TextColumn::make('url')
                    ->label(__('filament-fabricator::page-resource.labels.url'))
                    ->toggleable()
                    ->limit(25)
                    ->badge()
                    ->color('success')
                    ->getStateUsing(fn (?PageContract $record) => FilamentFabricator::getPageUrlFromId($record->id) ?: null)
                    ->url(fn (?PageContract $record) => FilamentFabricator::getPageUrlFromId($record->id) ?: null, true)
                    ->visible(config('filament-fabricator.routing.enabled')),

                TextColumn::make('layout')
                    ->label(__('filament-fabricator::page-resource.labels.layout'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'juno'  => 'danger',
                        default => 'gray',
                    })
                    ->toggleable()
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label(__('Published'))
                    ->toggleable()
                    ->alignCenter()
                    ->sortable()
                    ->searchable(),

                ToggleColumn::make('is_password_protected')
                    ->label(__('Password Protected'))
                    ->toggleable()
                    ->alignCenter()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('access_password')
                    ->label(__('Has Password'))
                    ->badge()
                    ->alignCenter()
                    ->toggleable()
                    ->formatStateUsing(fn ($state) => $state ? __('Yes') : __('No'))
                    ->color(fn ($state) => $state ? 'success' : 'gray')
                    ->icon(fn ($state) => $state ? 'heroicon-o-key' : 'heroicon-o-minus'),

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
                    ->options([
                        'default' => 'Default',
                        'blog'    => 'Blog',
                        'project' => 'Project',
                    ])
                    ->default('default')
                    ->label('Style'),

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
                Tabs::make('Page Management')
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('Page Constructor')
                            ->icon('heroicon-o-puzzle-piece')
                            ->schema([
                                Section::make('Page Builder')
                                    ->description('Design your page by adding and arranging components')
                                    ->icon('heroicon-o-puzzle-piece')
                                    ->collapsible()
                                    ->schema([
                                        PageBuilder::make('blocks')
                                            ->label(false)
                                            ->blocks(FilamentFabricator::getPageBlocks())
                                            ->collapsible(false)
                                            ->cloneable()
                                            ->collapsible()
                                            ->showSidebar(false),
                                    ]),
                            ]),

                        Tabs\Tab::make('Page Details')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Section::make('Page Information')
                                    ->description('Basic information about the page')
                                    ->icon('heroicon-o-information-circle')
                                    ->collapsible()
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label(__('Title'))
                                                    ->helperText(__('The title of the page'))
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
                                                    ->helperText(__('This will be the URL of your page. Use / for homepage')),

                                                Select::make('layout')
                                                    ->label(__('Layout'))
                                                    ->helperText(__('Select the layout for this page'))
                                                    ->options(FilamentFabricator::getLayouts())
                                                    ->required(),
                                            ]),
                                    ]),

                                Section::make('SEO Information')
                                    ->description('Search engine optimization settings for this page')
                                    ->icon('heroicon-o-magnifying-glass')
                                    ->collapsible()
                                    ->schema([
                                        TextInput::make('meta_title')
                                            ->label(__('Meta Title'))
                                            ->helperText(__('Title that appears in search engine results (if different from page title)'))
                                            ->maxLength(60),

                                        TextInput::make('meta_description')
                                            ->label(__('Meta Description'))
                                            ->helperText(__('Brief description used in search engine results'))
                                            ->maxLength(160),

                                        TextInput::make('meta_keywords')
                                            ->label(__('Meta Keywords'))
                                            ->helperText(__('Keywords separated by commas'))
                                            ->maxLength(255),
                                    ]),

                                Section::make('Page Scripts')
                                    ->description('Add custom scripts that will run only on this page')
                                    ->icon('heroicon-o-code-bracket')
                                    ->collapsible()
                                    ->schema([
                                        \Filament\Forms\Components\Textarea::make('header_scripts')
                                            ->label(__('Header Scripts'))
                                            ->helperText(__('Scripts that will be added to the <head> section of this page only'))
                                            ->placeholder('<script>// Your script here</script>')
                                            ->rows(6),

                                        \Filament\Forms\Components\Textarea::make('footer_scripts')
                                            ->label(__('Footer Scripts'))
                                            ->helperText(__('Scripts that will be added before the closing </body> tag of this page only'))
                                            ->placeholder('<script>// Your script here</script>')
                                            ->rows(6),
                                    ]),
                            ]),

                        Tabs\Tab::make('Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Section::make(__('Visibility & Access'))
                                    ->description(__('Control who can see this page and when'))
                                    ->icon('heroicon-o-eye')
                                    ->collapsible()
                                    ->columns(3)
                                    ->schema([
                                        Toggle::make('is_active')
                                            ->label(__('Published'))
                                            ->helperText(__('Make this page visible to visitors'))
                                            ->default(true),

                                        Toggle::make('is_password_protected')
                                            ->label(__('Password Protected'))
                                            ->helperText(__('Require a password to view this page'))
                                            ->reactive(),

                                        TextInput::make('access_password')
                                            ->label(__('Access Password'))
                                            ->revealable()
                                            ->password()
                                            ->helperText(function ($record) {
                                                if ($record && ! empty($record->access_password)) {
                                                    return __('Password is set. Enter a new password to change it, or leave empty to keep current password.');
                                                }

                                                return __('Password required to access this page.');
                                            })
                                            ->placeholder(function ($record) {
                                                if ($record && ! empty($record->access_password)) {
                                                    return '••••••••••••••••';
                                                }

                                                return __('Enter password');
                                            })
                                            ->visible(fn ($get) => $get('is_password_protected'))
                                            ->dehydrateStateUsing(function ($state, $record) {
                                                // Se o campo está vazio e estamos editando um registro existente, manter a senha atual
                                                if (empty($state) && $record) {
                                                    return $record->access_password;
                                                }

                                                // Se uma nova senha foi digitada, fazer hash
                                                return filled($state) ? bcrypt($state) : null;
                                            })
                                            ->afterStateHydrated(function ($component, $state, $record) {
                                                // Limpar o campo ao carregar para não mostrar o hash, mas manter placeholder
                                                $component->state('');
                                            }),
                                    ]),

                                Section::make(__('Page Behavior'))
                                    ->description(__('Configure how this page functions'))
                                    ->icon('heroicon-o-arrow-path')
                                    ->collapsible()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('advanced_settings.behavior.redirect_url')
                                            ->label(__('Redirect URL'))
                                            ->prefixIcon('heroicon-o-link')
                                            ->url()
                                            ->helperText(__('If set, visitors will be redirected to this URL')),
                                    ]),

                            ]),
                    ])
                    ->persistTabInQueryString('tab'),
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

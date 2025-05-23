<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Closure;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;

    protected static ?int $navigationSort = 0;

    public static function getNavigationLabel(): string
    {
        return __('Settings');
    }

    public static function getNavigationUrl(): string
    {
        return static::getUrl('edit', ['record' => Setting::first('id')->id]);
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\EditSetting::class,
            Pages\EditAppearance::class,
            Pages\EditNavigation::class,
            Pages\EditBlogSettings::class,
            Pages\EditChatbox::class,
            Pages\EditMaintenanceSection::class,
            Pages\EditSecurity::class,
        ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('settings_tabs')
                    ->persistTab(true)
                    ->persistTabInQueryString('id')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make(__('Quick Settings'))
                            ->icon('heroicon-o-bolt')
                            ->schema([
                                Section::make(__('Essential Settings'))
                                    ->description(__('The most important settings for your application.'))
                                    ->icon('heroicon-o-star')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('application.name')
                                            ->label(__('Application Name'))
                                            ->default('Warriorfolio'.env('APP_VERSION'))
                                            ->helperText(__('Define the application name.'))
                                            ->prefixIcon('heroicon-o-user')
                                            ->required(),
                                        TextInput::make('meta.meta_title')
                                            ->maxLength(255)
                                            ->label(__('Website Meta Title'))
                                            ->helperText(__('Define the application meta title.'))
                                            ->prefixIcon('heroicon-o-tag'),
                                        Textarea::make('meta.meta_description')
                                            ->maxLength(500)
                                            ->columnSpanFull()
                                            ->rows(2)
                                            ->label(__('Website Description '))
                                            ->helperText(__('Description of your application.')),
                                        TextInput::make('meta.meta_keywords')
                                            ->maxLength(255)
                                            ->helperText(__('Meta keywords for your website.'))
                                            ->prefixIcon('heroicon-o-tag')
                                            ->label(__('Meta Keywords')),
                                        TextInput::make('meta.meta_author')
                                            ->maxLength(255)
                                            ->helperText(__('Define the application author.'))
                                            ->prefixIcon('heroicon-o-user')
                                            ->label(__('Meta Author')),
                                    ]),

                                Section::make(__('Features Control'))
                                    ->description(__('Enable or disable features for your application.'))
                                    ->icon('heroicon-o-rectangle-group')
                                    ->columns(4)
                                    ->collapsible()
                                    ->schema([
                                        Checkbox::make('config.scroll_up_is_active')
                                            ->required()
                                            ->label(__('Scroll Up'))
                                            ->helperText(__('Scroll up button feature.'))
                                            ->default(true),
                                        Checkbox::make('config.empty_section')
                                            ->required()
                                            ->label(__('Empty Section'))
                                            ->helperText(__('Alert for Empty Sections'))
                                            ->default(true),
                                        Checkbox::make('config.quickbar_is_active')
                                            ->required()
                                            ->label(__('Quickbar'))
                                            ->helperText(__('Enable or disable the quickbar.'))
                                            ->default(true),
                                    ]),
                            ]),

                        Tab::make(__('Core Modules'))
                            ->icon('heroicon-o-cube')
                            ->schema([
                                Section::make(__('Core Module Decoupling'))
                                    ->relationship('core')
                                    ->description(__('Couple or decouple core modules from your default layout.'))
                                    ->icon('heroicon-o-cpu-chip')
                                    ->schema([
                                        Group::make()
                                            ->columns(3)
                                            ->schema([
                                                Checkbox::make('header')
                                                    ->label(__('Header'))
                                                    ->inline(),
                                                Checkbox::make('footer')
                                                    ->label(__('Footer'))
                                                    ->inline(),
                                                Checkbox::make('newsletter')
                                                    ->label(__('Newsletter'))
                                                    ->inline(),
                                                Checkbox::make('contact')
                                                    ->label(__('Contact'))
                                                    ->inline(),
                                                Checkbox::make('about')
                                                    ->label(__('About'))
                                                    ->inline(),
                                                Checkbox::make('clients')
                                                    ->label(__('Clients'))
                                                    ->inline(),
                                                Checkbox::make('hero')
                                                    ->label(__('Hero Section'))
                                                    ->inline(),
                                                Checkbox::make('portfolio')
                                                    ->label(__('Portfolio'))
                                                    ->inline(),
                                                Checkbox::make('blog')
                                                    ->label(__('Blog'))
                                                    ->inline(),
                                            ]),
                                    ]),

                                Section::make(__('Core Modules Global Visibility Control'))
                                    ->description(__('Enable or disable modules. This is a global setting and will hide the module from entire application.'))
                                    ->icon('heroicon-o-eye')
                                    ->schema([
                                        Group::make()
                                            ->columns(4)
                                            ->relationship('module')
                                            ->schema([
                                                Checkbox::make('about')
                                                    ->label(__('About'))
                                                    ->inline(),
                                                Checkbox::make('blog')
                                                    ->label(__('Blog'))
                                                    ->inline(),
                                                Checkbox::make('clients')
                                                    ->label(__('Clients'))
                                                    ->inline(),
                                                Checkbox::make('contact')
                                                    ->label(__('Contact'))
                                                    ->inline(),
                                                Checkbox::make('footer')
                                                    ->label(__('Footer'))
                                                    ->inline(),
                                                Checkbox::make('hero')
                                                    ->label(__('Hero Section'))
                                                    ->inline(),
                                                Checkbox::make('newsletter')
                                                    ->label(__('Newsletter'))
                                                    ->inline(),
                                                Checkbox::make('portfolio')
                                                    ->label(__('Portfolio'))
                                                    ->inline(),
                                            ]),
                                    ]),
                            ]),

                        Tab::make(__('SEO'))
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Section::make(__('Meta Information'))
                                    ->description(__('Configure how search engines discover and display your website.'))
                                    ->icon('heroicon-o-globe-alt')
                                    ->collapsible()
                                    ->schema([
                                        Textarea::make('meta.meta_description')
                                            ->maxLength(500)
                                            ->rows(2)
                                            ->label(__('Meta Description'))
                                            ->helperText(__('Description of your application.'))
                                            ->columnSpanFull(),

                                        Group::make()
                                            ->columnSpanFull()
                                            ->columns(2)
                                            ->schema([
                                                Group::make()
                                                    ->schema([
                                                        TextInput::make('meta.meta_title')
                                                            ->maxLength(255)
                                                            ->label(__('Meta Title'))
                                                            ->helperText(__('Define the application meta title.'))
                                                            ->prefixIcon('heroicon-o-document-text'),

                                                        TextInput::make('meta.meta_keywords')
                                                            ->maxLength(255)
                                                            ->helperText(__('Separate keywords with commas'))
                                                            ->prefixIcon('heroicon-o-tag')
                                                            ->label(__('Meta Keywords')),
                                                    ]),

                                                Group::make()
                                                    ->schema([
                                                        TextInput::make('meta.meta_robots')
                                                            ->maxLength(255)
                                                            ->helperText(__('e.g., index, follow, noindex, nofollow'))
                                                            ->prefixIcon('heroicon-o-queue-list')
                                                            ->label(__('Meta Robots')),

                                                        TextInput::make('meta.meta_author')
                                                            ->maxLength(255)
                                                            ->helperText(__('Define the content author'))
                                                            ->prefixIcon('heroicon-o-user')
                                                            ->label(__('Meta Author')),
                                                    ]),
                                            ]),

                                        Textarea::make('google.tag')
                                            ->maxLength(900)
                                            ->rows(3)
                                            ->helperText(__('Google Site Verification code.'))
                                            ->label(__('Google Verification / Google Tag'))
                                            ->placeholder('ex: 1a2b3c4d5e6f7g8h9i0j')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tab::make(__('External Add-ons'))
                            ->icon('heroicon-o-beaker')
                            ->schema([
                                Section::make(__('Google Services'))
                                    ->description(__('Configure Google services integration for your website.'))
                                    ->icon('heroicon-o-globe-alt')
                                    ->collapsible()
                                    ->schema([
                                        Group::make()
                                            ->columns(1)
                                            ->schema([
                                                TextInput::make('google.font_name')
                                                    ->maxLength(255)
                                                    ->helperText(__('Default: Inter'))
                                                    ->prefixIcon('heroicon-o-document-text')
                                                    ->label(__('Google Fonts Name')),
                                                Textarea::make('google.fonts_code')
                                                    ->rows(3)
                                                    ->maxLength(65535)
                                                    ->helperText(__('Paste your Google Fonts code here. Just one default font is allowed.'))
                                                    ->label(__('Google Fonts Code')),
                                                Textarea::make('google.analytics')
                                                    ->rows(3)
                                                    ->maxLength(65535)
                                                    ->helperText(__('Paste your Google Analytics code here.'))
                                                    ->label(__('Google Analytics Code')),
                                            ]),
                                    ]),

                                Section::make(__('Custom Scripts'))
                                    ->description(__('Add custom scripts to be loaded in your application.'))
                                    ->icon('heroicon-o-code-bracket')
                                    ->collapsible()
                                    ->schema([
                                        Group::make()
                                            ->columns(1)
                                            ->schema([
                                                Textarea::make('scripts.header_scripts')
                                                    ->maxLength(65535)
                                                    ->rows(3)
                                                    ->helperText(__('Paste your scripts here. This will be loaded in the header.'))
                                                    ->label(__('Header Scripts')),
                                                Textarea::make('scripts.body_scripts')
                                                    ->maxLength(65535)
                                                    ->rows(3)
                                                    ->helperText(__('Paste your scripts here. This will be loaded in the body.'))
                                                    ->label(__('Body Scripts')),
                                            ]),
                                    ]),
                            ]),

                        Tab::make(__('API Keys & Integrations'))
                            ->icon('heroicon-o-key')
                            ->schema([
                                Tabs::make('api_integrations')
                                    ->persistTab()
                                    ->persistTabInQueryString('id')
                                    ->tabs([
                                        Tab::make(__('GitHub Service'))
                                            ->icon('heroicon-o-code-bracket-square')
                                            ->schema([
                                                Group::make()
                                                    ->columns(1)
                                                    ->schema([
                                                        Group::make()
                                                            ->columns(4)
                                                            ->schema([
                                                                Toggle::make('config.github_is_active')
                                                                    ->label(__('Enable GitHub Service'))
                                                                    ->helperText(__('Enable or disable the GitHub service.'))
                                                                    ->default(true)
                                                                    ->live(),
                                                                Toggle::make('config.show_graphs')
                                                                    ->label(__('Show Graphs'))
                                                                    ->helperText(__('Enable or disable the graphs.'))
                                                                    ->default(true),
                                                                Toggle::make('config.show_repositories_feed')
                                                                    ->label(__('Show Repositories Feed'))
                                                                    ->helperText(__('Enable or disable the repositories feed.'))
                                                                    ->default(true),
                                                                TextInput::make('config.repository_quantity')
                                                                    ->label(__('Repository Quantity'))
                                                                    ->helperText(__('Number of repositories to display. Max: 100'))
                                                                    ->numeric()
                                                                    ->default(9)
                                                                    ->minValue(1)
                                                                    ->maxValue(100),
                                                            ]),
                                                        TextInput::make('config.github_api_token')
                                                            ->maxLength(255)
                                                            ->helperText(__('GitHub Personal Access Token for API integration.'))
                                                            ->prefixIcon('heroicon-o-key')
                                                            ->password()
                                                            ->required(fn (Get $get) => $get('config.github_is_active'))
                                                            ->live()
                                                            ->revealable()
                                                            ->label(__('GitHub API Token')),
                                                        TextInput::make('config.github_username')
                                                            ->maxLength(255)
                                                            ->required(fn (Get $get) => $get('config.github_is_active'))
                                                            ->live()
                                                            ->helperText(__('Your GitHub username for profile and repository access.'))
                                                            ->prefixIcon('heroicon-o-user')
                                                            ->label(__('GitHub Username')),
                                                        TagsInput::make('config.github_repositories')
                                                            ->placeholder(__('repo name'))
                                                            ->helperText(__('Enter the names of the repositories you want to show. Leave empty to show all repositories.'))
                                                            ->label(__('Show Only Repositories')),
                                                    ]),
                                            ]),
                                        Tab::make(__('Google reCAPTCHA'))
                                            ->icon('heroicon-o-shield-check')
                                            ->schema([
                                                Group::make()
                                                    ->columns(1)
                                                    ->schema([
                                                        Group::make()
                                                            ->columns(2)
                                                            ->schema([
                                                                Toggle::make('config.recaptcha_is_active')
                                                                    ->label(__('Enable reCAPTCHA'))
                                                                    ->helperText(__('Enable or disable Google reCAPTCHA protection. Currently supporting reCAPTCHA v2'))
                                                                    ->default(true)
                                                                    ->live(),
                                                            ]),
                                                        TextInput::make('config.recaptcha_site_key')
                                                            ->maxLength(255)
                                                            ->helperText(__('Google reCAPTCHA Site Key'))
                                                            ->prefixIcon('heroicon-o-key')
                                                            ->required(fn (Get $get) => $get('config.recaptcha_is_active'))
                                                            ->live()
                                                            ->label(__('Site Key')),
                                                        TextInput::make('config.recaptcha_secret_key')
                                                            ->maxLength(255)
                                                            ->helperText(__('Google reCAPTCHA Secret Key'))
                                                            ->prefixIcon('heroicon-o-key')
                                                            ->password()
                                                            ->revealable()
                                                            ->required(fn (Get $get) => $get('config.recaptcha_is_active'))
                                                            ->live()
                                                            ->label(__('Secret Key')),
                                                    ]),
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
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
            'index'                    => Pages\ListSettings::route('/'),
            'edit'                     => Pages\EditSetting::route('/{record}/edit'),
            'edit-appearance'          => Pages\EditAppearance::route('/{record}/edit-appearance'),
            'edit-chatbox'             => Pages\EditChatbox::route('/{record}/edit-chatbox'),
            'edit-maintenance-section' => Pages\EditMaintenanceSection::route('/{record}/edit-maintenance-section'),
            'edit-navigation'          => Pages\EditNavigation::route('/{record}/edit-navigation'),
            'edit-security'            => Pages\EditSecurity::route('/{record}/edit-security'),
            'edit-blog'                => Pages\EditBlogSettings::route('/{record}/edit-blog'),

        ];
    }
}

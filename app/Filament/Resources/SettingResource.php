<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
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

    protected static ?int $navigationSort = 0;

    public static function getNavigationLabel(): string
    {
        return __('Application Settings');
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\EditSetting::class,
            Pages\EditAppearance::class,
            Pages\EditNavigation::class,
            Pages\EditAboutSection::class,
            Pages\EditClientSection::class,
            Pages\EditContactSection::class,
            Pages\EditFooterSection::class,
            Pages\EditHeroSection::class,
            Pages\EditNewsletterSection::class,
            Pages\EditPortfolioSection::class,
            Pages\EditChatbox::class,
            Pages\EditMaintenanceSection::class,
            Pages\EditSecurity::class,
        ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Application Settings'))
                    ->description(__('Define the design and layout of your application.'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Application Name'))
                            ->helperText(__('Define the application name.'))
                            ->prefixIcon('heroicon-o-user')
                            ->required(),
                        TextInput::make('meta_title')
                            ->maxLength(255)
                            ->label(__('Website Meta Title'))
                            ->helperText(__('Define the application meta title.'))
                            ->prefixIcon('heroicon-o-tag'),
                        Textarea::make('meta_description')
                            ->maxLength(500)
                            ->columnSpanFull()
                            ->rows(2)
                            ->label(__('Website Description '))
                            ->helperText(__('Description of your application.')),
                        TextInput::make('meta_keywords')
                            ->maxLength(255)
                            ->helperText(__('Meta keywords for your website.'))
                            ->prefixIcon('heroicon-o-tag')
                            ->label(__('Meta Keywords')),
                        TextInput::make('meta_author')
                            ->maxLength(255)
                            ->helperText(__('Define the application author.'))
                            ->prefixIcon('heroicon-o-user')
                            ->label(__('Meta Author')),
                        TextInput::make('meta_robots')
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-tag')
                            ->label(__('Meta Robots')),
                        TextInput::make('meta_google_site_verification')
                            ->maxLength(255)
                            ->placeholder('ex: 1a2b3c4d5e6f7g8h9i0j')
                            ->password()
                            ->revealable()
                            ->prefixIcon('heroicon-o-globe-alt')
                            ->label(__('Google Verification')),
                    ]),
                Section::make(__('Core Module Decoupling'))
                    ->relationship('core')
                    ->columns(4)
                    ->description(__('Couple or decouple core modules from your default layout.'))
                    ->icon('heroicon-o-cpu-chip')
                    ->schema([
                        Toggle::make('header')
                            ->label(__('Header')),
                        Toggle::make('footer')
                            ->label(__('Footer')),
                        Toggle::make('newsletter')
                            ->label(__('Newsletter')),
                        Toggle::make('contact')
                            ->label(__('Contact')),
                        Toggle::make('about')
                            ->label(__('About')),
                        Toggle::make('clients')
                            ->label(__('Clients')),
                        Toggle::make('hero')
                            ->label(__('Hero Section')),
                        Toggle::make('portfolio')
                            ->label(__('Portfolio')),
                    ]),
                Section::make(__('Core Modules Global Visibility Control'))
                    ->description(__('Enable or disable modules. This is a global setting and will hide the module from entire application.'))
                    ->icon('heroicon-o-cpu-chip')
                    ->schema([
                        Group::make()
                            ->relationship('module')
                            ->schema([
                                Toggle::make('about')
                                    ->label(__('About'))
                                    ->inline(),
                                Toggle::make('clients')
                                    ->label(__('Clients'))
                                    ->inline(),
                                Toggle::make('contact')
                                    ->label(__('Contact'))
                                    ->inline(),
                                Toggle::make('footer')
                                    ->label(__('Footer'))
                                    ->inline(),
                                Toggle::make('hero')
                                    ->label(__('Hero'))
                                    ->inline(),
                                Toggle::make('newsletter')
                                    ->label(__('Newsletter'))
                                    ->inline(),
                                Toggle::make('portfolio')
                                    ->label(__('Portfolio'))
                                    ->inline(),
                            ])->columns(4),
                    ]),
                Section::make(__('External Add-ons'))
                    ->description(__('Define scripts to be loaded in your application.'))
                    ->icon('heroicon-o-beaker')
                    ->schema([
                        TextInput::make('google_fonts_name')
                            ->columnSpanFull()
                            ->maxLength(255)
                            ->helperText(__('Default: Inter'))
                            ->label(__('Google Fonts Name')),
                        Textarea::make('google_fonts_code')
                            ->rows(3)
                            ->maxLength(65535)
                            ->columnSpanFull()
                            ->helperText(__('Paste your Google Fonts code here. Just one default font is allowed.'))
                            ->label(__('Google Fonts Code')),
                        Textarea::make('google_analytics')
                            ->rows(3)
                            ->columnSpanFull()
                            ->maxLength(65535)
                            ->helperText(__('Paste your Google Analytics code here.'))
                            ->label(__('Google Analytics Code')),
                        Textarea::make('header_scripts')
                            ->maxLength(65535)
                            ->rows(3)
                            ->columnSpanFull()
                            ->helperText(__('Paste your scripts here. This will be loaded in the header.'))
                            ->label(__('Header Scripts')),
                        Textarea::make('body_scripts')
                            ->maxLength(65535)
                            ->rows(3)
                            ->columnSpanFull()
                            ->helperText(__('Paste your scripts here. This will be loaded in the body.'))
                            ->label(__('Body Scripts')),
                    ])->collapsed()->columns(2),
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
            'edit-contact-section'     => Pages\EditContactSection::route('/{record}/edit-contact-section'),
            'edit-hero-section'        => Pages\EditHeroSection::route('/{record}/edit-hero-section'),
            'edit-portfolio-section'   => Pages\EditPortfolioSection::route('/{record}/edit-portfolio-section'),
            'edit-about-section'       => Pages\EditAboutSection::route('/{record}/edit-about-section'),
            'edit-client-section'      => Pages\EditClientSection::route('/{record}/edit-client-section'),
            'edit-newsletter-section'  => Pages\EditNewsletterSection::route('/{record}/edit-newsletter-section'),
            'edit-footer-section'      => Pages\EditFooterSection::route('/{record}/edit-footer-section'),
            'edit-maintenance-section' => Pages\EditMaintenanceSection::route('/{record}/edit-maintenance-section'),
            'edit-navigation'          => Pages\EditNavigation::route('/{record}/edit-navigation'),
            'edit-security'            => Pages\EditSecurity::route('/{record}/edit-security'),
        ];
    }
}

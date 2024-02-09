<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Resources\SettingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingResource\RelationManagers;
use Filament\Widgets\Widget;

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
                Section::make('Application Settings')
                    ->description('Define the design and layout of your application')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Application Name')
                            ->required(),
                        Forms\Components\TextInput::make('meta_title')
                            ->maxLength(255)
                            ->label('Meta Title'),
                        Forms\Components\TextArea::make('meta_description')
                            ->maxLength(500)
                            ->columnSpanFull()
                            ->rows(2)
                            ->label('Meta Description'),
                        Forms\Components\TextInput::make('meta_keywords')
                            ->maxLength(255)
                            ->label('Meta Keywords'),
                        Forms\Components\TextInput::make('meta_author')
                            ->maxLength(255)
                            ->label('Meta Author'),
                        Forms\Components\TextInput::make('meta_robots')
                            ->maxLength(255)
                            ->label('Meta Robots'),
                        Forms\Components\TextInput::make('meta_google_site_verification')
                            ->maxLength(255)
                            ->placeholder('ex: 1a2b3c4d5e6f7g8h9i0j')
                            ->password()
                            ->revealable()
                            ->label('Google Site Verification. Verify ownership using an HTML tag'),
                    ])->columns(2),
                Section::make('Core Module Decoupling')
                    ->relationship('core')
                    ->columns(4)
                    ->description('Couple or decouple core modules from your default layout.')
                    ->icon('heroicon-o-cpu-chip')
                    ->schema([
                        Toggle::make('header')
                            ->label('Header'),
                        Toggle::make('footer')
                            ->label('Footer'),
                        Toggle::make('newsletter')
                            ->label('Newsletter'),
                        Toggle::make('contact')
                            ->label('Contact'),
                        Toggle::make('about')
                            ->label('About'),
                        Toggle::make('clients')
                            ->label('Clients'),
                        Toggle::make('hero')
                            ->label('Hero Section'),
                        Toggle::make('portfolio')
                            ->label('Portfolio'),
                    ]),
                Section::make('Core Modules Global Visibility Control')
                    ->description('Enable or disable modules. This is a global setting and will hide the module from entire application.')
                    ->icon('heroicon-o-cpu-chip')
                    ->schema([
                        Group::make()
                            ->relationship('module')
                            ->schema([
                                Forms\Components\Toggle::make('about')
                                    ->label('About Module')
                                    ->inline(),
                                Forms\Components\Toggle::make('clients')
                                    ->label('Clients Module')
                                    ->inline(),
                                Forms\Components\Toggle::make('contact')
                                    ->label('Contact Module')
                                    ->inline(),
                                Forms\Components\Toggle::make('footer')
                                    ->label('Footer Module')
                                    ->inline(),
                                Forms\Components\Toggle::make('hero')
                                    ->label('Hero Module')
                                    ->inline(),
                                Forms\Components\Toggle::make('newsletter')
                                    ->label('Newsletter Module')
                                    ->inline(),
                                Forms\Components\Toggle::make('portfolio')
                                    ->label('Portfolio Module')
                                    ->inline(),
                            ])->columns(4),
                    ]),
                Section::make('External Add-ons')
                    ->description('Define scripts to be loaded in your application')
                    ->icon('heroicon-o-beaker')
                    ->schema([
                        Forms\Components\Textarea::make('google_fonts_name')
                            ->rows(1)
                            ->maxLength(255)
                            ->helperText('Default: Inter')
                            ->label('Google Fonts Name'),
                        Forms\Components\Textarea::make('google_fonts_code')
                            ->rows(5)
                            ->maxLength(65535)
                            ->columnSpanFull()
                            ->helperText('Paste your Google Fonts code here. Just one default font is allowed.')
                            ->label('Google Fonts Code'),
                        Forms\Components\Textarea::make('google_analytics')
                            ->rows(5)
                            ->columnSpanFull()
                            ->maxLength(65535)
                            ->helperText('Paste your Google Analytics code here.')
                            ->label('Google Analytics Code'),
                        Forms\Components\Textarea::make('header_scripts')
                            ->maxLength(65535)
                            ->rows(5)
                            ->columnSpanFull()
                            ->helperText('Paste your scripts here. This will be loaded in the header.')
                            ->label('Header Scripts'),
                        Forms\Components\Textarea::make('body_scripts')
                            ->maxLength(65535)
                            ->rows(5)
                            ->columnSpanFull()
                            ->helperText('Paste your scripts here. This will be loaded in the body.')
                            ->label('Body Scripts'),
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
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
            'edit-appearance' => Pages\EditAppearance::route('/{record}/edit-appearance'),
            'edit-chatbox' => Pages\EditChatbox::route('/{record}/edit-chatbox'),
            'edit-contact-section' => Pages\EditContactSection::route('/{record}/edit-contact-section'),
            'edit-hero-section' => Pages\EditHeroSection::route('/{record}/edit-hero-section'),
            'edit-portfolio-section' => Pages\EditPortfolioSection::route('/{record}/edit-portfolio-section'),
            'edit-about-section' => Pages\EditAboutSection::route('/{record}/edit-about-section'),
            'edit-client-section' => Pages\EditClientSection::route('/{record}/edit-client-section'),
            'edit-newsletter-section' => Pages\EditNewsletterSection::route('/{record}/edit-newsletter-section'),
            'edit-footer-section' => Pages\EditFooterSection::route('/{record}/edit-footer-section'),
            'edit-maintenance-section' => Pages\EditMaintenanceSection::route('/{record}/edit-maintenance-section'),
            'edit-navigation' => Pages\EditNavigation::route('/{record}/edit-navigation'),
            'edit-security' => Pages\EditSecurity::route('/{record}/edit-security'),
        ];
    }
}

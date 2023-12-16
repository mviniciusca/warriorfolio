<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SettingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingResource\RelationManagers;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Application';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 0;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Design & Appearance')
                    ->description('Define the design and layout of your application')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Forms\Components\FileUpload::make('background_image')
                            ->image()
                            ->imageEditor()
                            ->directory('app')
                            ->label('Background Image')->columnSpan(3),
                        Forms\Components\FileUpload::make('logo')
                            ->image()
                            ->imageEditor()
                            ->directory('app')
                            ->helperText('.png transparent or .svg will be nice!')
                            ->label('Logo'),
                        Forms\Components\FileUpload::make('favicon')
                            ->image()
                            ->imageEditor()
                            ->directory('app')
                            ->helperText('.ico or .png would be amazing!')
                            ->label('Favicon'),
                    ])
                    ->columns(5)->collapsed(),
                Section::make('Sections Settings')
                    ->description('Define the design and layout of your application')
                    ->icon('heroicon-o-light-bulb')
                    ->schema([
                        Group::make()
                            ->relationship('layout')
                            ->schema([
                                Forms\Components\TextInput::make('hero_section_title')
                                    ->autofocus()
                                    ->label('Hero Section Title')
                                    ->helperText('This is the main title of your hero section')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('hero_section_subtitle_text')
                                    ->label('Hero Section Subtitle')
                                    ->helperText('This is the subtitle of your hero section')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('portfolio_section_title')
                                    ->label('Portfolio Section Title')
                                    ->helperText('This is the title of your portfolio section')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('portfolio_section_subtitle_text')
                                    ->label('Portfolio Section Subtitle')
                                    ->helperText('This is the subtitle of your portfolio section')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('about_section_title')
                                    ->label('About Section Title')
                                    ->helperText('This is the title of your about section')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('about_section_subtitle_text')
                                    ->label('About Section Subtitle')
                                    ->helperText('This is the subtitle of your about section')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('contact_section_title')
                                    ->label('Contact Section Title')
                                    ->helperText('This is the title of your contact section')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('contact_section_subtitle_text')
                                    ->label('Contact Section Subtitle')
                                    ->helperText('This is the subtitle of your contact section')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('clients_section_text')
                                    ->label('Clients Section Text')
                                    ->helperText('This is the text of your clients section')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('clients_section_subtitle_text')
                                    ->label('Clients Section Subtitle')
                                    ->helperText('This is the subtitle of your clients section')
                                    ->maxLength(255),
                            ])->columnSpanFull()->columns(2),
                    ])->columns(3)->collapsed(),
                Section::make('Application Settings')
                    ->description('Define the design and layout of your application')
                    ->icon('heroicon-o-sparkles')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Application Name')
                            ->required(),
                        Forms\Components\TextInput::make('meta_title')
                            ->label('Meta Title'),
                        Forms\Components\TextInput::make('meta_description')
                            ->label('Meta Description'),
                        Forms\Components\TextInput::make('meta_keywords')
                            ->label('Meta Keywords'),
                        Forms\Components\TextInput::make('meta_author')
                            ->label('Meta Author'),
                        Forms\Components\TextInput::make('meta_robots')
                            ->label('Meta Robots'),
                        Forms\Components\TextInput::make('meta_google_site_verification')
                            ->placeholder('ex: 1a2b3c4d5e6f7g8h9i0j')
                            ->label('Google Site Verification'),
                    ])->columns(3)->collapsed(),
                Section::make('Modules Control')->description('Enable or disable modules')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        Group::make()
                            ->relationship('module')
                            ->schema([
                                Forms\Components\Toggle::make('portfolio')
                                    ->label('Portfolio Module')
                                    ->inline(false),
                                Forms\Components\Toggle::make('contact')
                                    ->label('Contact Module')
                                    ->inline(false),
                                Forms\Components\Toggle::make('about')
                                    ->label('About Module')
                                    ->inline(false),
                                Forms\Components\Toggle::make('clients')
                                    ->label('Clients Module')
                                    ->inline(false),
                                Forms\Components\Toggle::make('newsletter')
                                    ->label('Newsletter Module')
                                    ->inline(false),
                            ])->columns(5),
                    ])->collapsed(),
                Section::make('External Add-ons')
                    ->description('Define scripts to be loaded in your application')
                    ->icon('heroicon-o-beaker')
                    ->schema([
                        Forms\Components\Textarea::make('google_analytics')
                            ->rows(2)
                            ->placeholder('')
                            ->label('Google Tag Analytics Code'),
                        Forms\Components\Textarea::make('header_scripts')
                            ->rows(2)
                            ->label('Head Scripts (ex: Facebook Pixel)'),
                        Forms\Components\Textarea::make('body_scripts')
                            ->rows(2)
                            ->label('Body Scripts (ex: Ionicons)'),
                    ])->collapsed(),
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
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}

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

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\EditAppearance::class,
            Pages\EditSection::class,
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
                        Forms\Components\TextInput::make('google_recaptcha_key')
                            ->placeholder('ex: 1b2c3d4e5f6g7h8i9j0a')
                            ->label('Google Recaptcha Key'),
                    ])->columns(3),
                Section::make('Modules Control')
                    ->description('Enable or disable modules')
                    ->icon('heroicon-o-cube')
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
            'edit-appearance' => Pages\EditAppearance::route('/{record}/edit-appearance'),
            'edit-section' => Pages\EditSection::route('/{record}/edit-section'),
        ];
    }
}

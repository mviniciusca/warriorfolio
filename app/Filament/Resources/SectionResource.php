<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-m-bars-3-center-left';

    protected static ?string $navigationGroup = 'Website Design';

    protected static ?int $navigationSort = -1;

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
                    ->label(__('Section Name'))
                    ->prefixIcon('heroicon-m-bars-3-center-left')
                    ->helperText(__('This is the name of the section that will be displayed in the admin panel.'))
                    ->live(onBlur: true),                Forms\Components\TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->prefixIcon('heroicon-m-bars-3-center-left')
                    ->maxLength(255)
                    ->helperText('⚠️ Please don\'t change it unless you know what you are doing.')
                    ->unique(Section::class, 'slug', ignoreRecord: true),
                Forms\Components\Tabs::make('Section')
                    ->persistTab()
                    ->persistTabInQueryString('id')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Fieldset::make(__('General Settings'))
                                    ->columns(2)
                                    ->schema([
                                        Toggle::make('is_active')
                                            ->label(__('Active'))
                                            ->helperText(__('Controls section visibility on the frontend'))
                                            ->onIcon('heroicon-o-check-circle')
                                            ->offIcon('heroicon-o-x-circle')
                                            ->default(true),
                                        Toggle::make('is_coupled')
                                            ->label(__('Coupled'))
                                            ->helperText(__('Integrates section with the main layout structure'))
                                            ->onIcon('heroicon-o-check-circle')
                                            ->offIcon('heroicon-o-x-circle')
                                            ->default(false),
                                    ]),

                                Fieldset::make(__('Background & Fill'))
                                    ->columns(2)
                                    ->schema([
                                        Toggle::make('content.is_filled')
                                            ->label(__('Fill Section'))
                                            ->helperText(__('Applies accent color background to the section'))
                                            ->onIcon('heroicon-o-check-circle')
                                            ->offIcon('heroicon-o-x-circle')
                                            ->default(false)
                                            ->live()
                                            ->afterStateUpdated(function (Set $set, $state) {
                                                if ($state) {
                                                    $set('content.is_section_filled_inverted', false);
                                                }
                                            }),
                                        Toggle::make('content.is_section_filled_inverted')
                                            ->label(__('Fill Section Inverted'))
                                            ->helperText(__('Applies inverted theme colors with contrasting text'))
                                            ->onIcon('heroicon-o-check-circle')
                                            ->offIcon('heroicon-o-x-circle')
                                            ->default(false)
                                            ->live()
                                            ->afterStateUpdated(function (Set $set, $state) {
                                                if ($state) {
                                                    $set('content.is_filled', false);
                                                }
                                            }),
                                    ]),

                                Fieldset::make(__('Layout & Display'))
                                    ->columns(1)
                                    ->schema([
                                        Toggle::make('content.with_padding')
                                            ->label(__('Vertical Padding'))
                                            ->onIcon('heroicon-o-check-circle')
                                            ->offIcon('heroicon-o-x-circle')
                                            ->helperText(__('Adds vertical spacing around section content'))
                                            ->default(true),
                                    ]),

                            ]),

                        Forms\Components\Tabs\Tab::make('Content')
                            ->icon('heroicon-o-cube')
                            ->schema(function (Forms\Get $get) {
                                $commonFields = [
                                    Fieldset::make(__('Section Header'))
                                        ->columns(2)
                                        ->schema([
                                            Group::make()
                                                ->columnSpanFull()
                                                ->columns(3)
                                                ->schema([
                                                    Toggle::make('content.is_heading_visible')
                                                        ->onIcon('heroicon-o-check-circle')
                                                        ->offIcon('heroicon-o-x-circle')
                                                        ->label(__('Heading Visible'))
                                                        ->helperText(__('Shows the section title and subtitle'))
                                                        ->default(false),
                                                    Toggle::make('content.is_centered')
                                                        ->onIcon('heroicon-o-check-circle')
                                                        ->offIcon('heroicon-o-x-circle')
                                                        ->label(__('Heading Centered'))
                                                        ->helperText(__('Centers the section title and subtitle'))
                                                        ->default(false),
                                                    Toggle::make('content.show_button')
                                                        ->onIcon('heroicon-o-check-circle')
                                                        ->offIcon('heroicon-o-x-circle')
                                                        ->label(__('Show Button'))
                                                        ->helperText(__('Displays the action button in the section'))
                                                        ->default(false),
                                                ]),
                                            Forms\Components\TextInput::make('content.title')
                                                ->label(__('Title'))
                                                ->placeholder(__('Enter section title'))
                                                ->prefixIcon('heroicon-m-bars-3-center-left')
                                                ->helperText(__('The main heading text for this section')),
                                            Forms\Components\TextInput::make('content.subtitle')
                                                ->label(__('Subtitle'))
                                                ->placeholder(__('Enter section subtitle'))
                                                ->prefixIcon('heroicon-m-bars-3-center-left')
                                                ->helperText(__('A secondary heading or supporting text')),
                                            Group::make()
                                                ->columns(3)
                                                ->columnSpanFull()
                                                ->schema([
                                                    Forms\Components\TextInput::make('content.button_header')
                                                        ->label(__('Button Text'))
                                                        ->placeholder(__('Enter button text'))
                                                        ->prefixIcon('heroicon-m-bars-3-center-left')
                                                        ->helperText(__('The text to display on the button')),
                                                    Forms\Components\TextInput::make('content.button_url')
                                                        ->label(__('Button URL'))
                                                        ->placeholder(__('Enter button URL'))
                                                        ->prefixIcon('heroicon-o-link')
                                                        ->helperText(__('The destination URL when the button is clicked')),
                                                    Forms\Components\TextInput::make('content.button_icon')
                                                        ->label(__('Button Icon'))
                                                        ->placeholder(__('Enter button icon'))
                                                        ->prefixIcon('heroicon-o-cube')
                                                        ->helperText(__('Ionicon name for the button icon')),
                                                ]),
                                        ]),
                                ];

                                // Footer
                                if ($get('slug') === 'footer') {
                                    return array_merge($commonFields, [
                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                Toggle::make('content.show_social_links')
                                                    ->label(__('Show Social Links'))
                                                    ->helperText(__('Displays social media links in the footer'))
                                                    ->default(true),
                                            ]),
                                    ]);
                                }

                                // Contact

                                if ($get('slug') === 'contact') {
                                    return array_merge($commonFields, [
                                        Group::make()
                                            ->columnSpanFull()
                                            ->schema([
                                                Fieldset::make(__(''))
                                                    ->columns(2)
                                                    ->schema([
                                                        Forms\Components\TextInput::make('content.email')
                                                            ->label(__('Email'))
                                                            ->placeholder(__('Enter email address'))
                                                            ->prefixIcon('heroicon-o-envelope')
                                                            ->helperText(__('The email address for contact')),
                                                        Forms\Components\TextInput::make('content.phone')
                                                            ->label(__('Phone'))
                                                            ->placeholder(__('Enter phone number'))
                                                            ->prefixIcon('heroicon-o-phone')
                                                            ->helperText(__('The phone number for contact')),
                                                        Forms\Components\TextInput::make('content.address')
                                                            ->label(__('Address'))
                                                            ->placeholder(__('Enter address'))
                                                            ->prefixIcon('heroicon-o-map')
                                                            ->helperText(__('The physical address for contact')),
                                                        Forms\Components\TextInput::make('content.business_hours')
                                                            ->label(__('Business Hours'))
                                                            ->placeholder(__('Enter business hours'))
                                                            ->prefixIcon('heroicon-o-clock')
                                                            ->helperText(__('The business hours for contact')),
                                                        Textarea::make('content.google_map')
                                                            ->label(__('Google Map'))
                                                            ->columnSpanFull()
                                                            ->rows(5)
                                                            ->placeholder(__('Enter Google Map URL'))
                                                            ->helperText(__('The Google Map URL for contact')),

                                                    ]),
                                            ]),
                                    ]);
                                }

                                // Newsletter

                                if ($get('slug') === 'newsletter') {
                                    return array_merge($commonFields, [
                                        Toggle::make('content.show_light')
                                            ->label(__('Light Beam'))
                                            ->helperText(__('Adds a light beam effect to the newsletter card'))
                                            ->default(true),
                                    ]);
                                }

                                return $commonFields;
                            }),

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
                    ->alignCenter()
                    ->label('Active'),
                Tables\Columns\IconColumn::make('is_coupled')
                    ->boolean()
                    ->sortable()
                    ->alignCenter()
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
                    //
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
            'index' => Pages\ListSections::route('/'),
            //'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}

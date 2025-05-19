<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
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
                Placeholder::make('Section Information')
                    ->hiddenLabel()
                    ->columnSpanFull()
                    ->content(__('Sections help organize your website content into distinct areas. Each section can contain multiple blocks and can be customized with different layouts and styles.'))
                    ->extraAttributes([
                        'class' => 'p-4 bg-gray-100 text-gray-600 border border-gray-200 rounded-lg dark:bg-gray-900 dark:text-gray-400 dark:border-gray-800',
                    ]),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label(__('Section Name'))
                    ->prefixIcon('heroicon-m-bars-3-center-left')
                    ->helperText(__('This is the name of the section that will be displayed in the admin panel.'))
                    ->live(onBlur: true),
                Forms\Components\TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->prefixIcon('heroicon-m-bars-3-center-left')
                    ->maxLength(255)
                    ->helperText('This is the unique identifier for the section.')
                    ->unique(Section::class, 'slug', ignoreRecord: true),
                Forms\Components\Tabs::make('Section')
                    ->persistTab()
                    ->persistTabInQueryString('id')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Group::make()
                                    ->columns(4)
                                    ->schema([
                                        Forms\Components\Toggle::make('is_active')
                                            ->label(__('Active'))
                                            ->helperText(__('If enabled, this section will be visible on the frontend'))
                                            ->default(true)
                                            ->required(),
                                        Forms\Components\Toggle::make('is_coupled')
                                            ->label(__('Coupled'))
                                            ->helperText(__('If enabled, this section will be coupled with the main layout'))
                                            ->default(false)
                                            ->required(),
                                        Forms\Components\Toggle::make('content.is_filled')
                                            ->label(__('Filled'))
                                            ->helperText(__('If enabled, this section will be filled with a color'))
                                            ->default(false)
                                            ->required(),
                                        Forms\Components\Toggle::make('content.is_section_filled_inverted')
                                            ->label(__('Section Filled Inverted'))
                                            ->helperText(__('If enabled, this section will be filled with a color and the text will be inverted'))
                                            ->default(false)
                                            ->required(),
                                        Forms\Components\Toggle::make('content.with_padding')
                                            ->label(__('With Padding'))
                                            ->helperText(__('If enabled, this section will have padding'))
                                            ->default(true)
                                            ->required(),
                                        Forms\Components\Toggle::make('content.is_heading_visible')
                                            ->label(__('Heading Visible'))
                                            ->helperText(__('If enabled, this section will have a heading'))
                                            ->default(false)
                                            ->required(),
                                        Forms\Components\Toggle::make('content.is_centered')
                                            ->label(__('Centered'))
                                            ->helperText(__('If enabled, this section will be centered'))
                                            ->default(false)
                                            ->required(),
                                    ]),

                            ]),

                        Forms\Components\Tabs\Tab::make('Content')
                            ->icon('heroicon-o-cube')
                            ->columns(2)
                            ->schema(function (Forms\Get $get) {
                                $commonFields = [
                                    Fieldset::make(__('Section Content'))
                                        ->columns(2)
                                        ->schema([
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
                                                Forms\Components\Toggle::make('content.show_social_links')
                                                    ->label(__('Show Social Links'))
                                                    ->helperText(__('Enable to display social media links in the footer'))
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
                                                Fieldset::make(__('Public Information'))
                                                    ->columns(3)
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
                                        Forms\Components\Toggle::make('content.show_light')
                                            ->label(__('Light Beam'))
                                            ->helperText(__('Show a light beam effect in the card'))
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

<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditHeroSection extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function getNavigationLabel(): string
    {
        return __('Hero Section');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Hero Section');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Manager your Hero Section from your website.');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    Group::make()
                        ->relationship('module')
                        ->schema([
                            Toggle::make('hero')
                                ->label(__('Show Hero Section'))
                                ->helperText(__('Show or hide the hero section on the website.')),
                        ]),
                ]),
            Section::make(__('Hero Section'))
                ->description(__('This section is used to display your hero section to the public.'))
                ->icon('heroicon-o-photo')
                ->schema([
                    Group::make()
                        ->relationship('layout')
                        ->schema([
                            Section::make(__('Title & Subtitle'))
                                ->collapsible()
                                ->schema([
                                    TextInput::make('hero.section_title')
                                        ->label(__('Hero Section Title'))
                                        ->helperText('💡 HTML allowed. Use the class "tl" to highlight a word in the title. Max: 140 characters.')
                                        ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                        ->columnSpanFull()
                                        ->maxLength(140),
                                    TextInput::make('hero.section_subtitle')
                                        ->label('Hero Section Subtitle')
                                        ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                        ->columnSpanFull()
                                        ->helperText('💡 HTML allowed. Use the class "tl" to highlight a word in the title. Max: 160 characters.')
                                        ->maxLength(160),
                                ]),

                            Section::make(__('Buttons'))
                                ->icon('heroicon-o-bolt')
                                ->collapsible()
                                ->schema([
                                    Repeater::make('buttons')
                                        ->label(__('Buttons'))
                                        ->helperText(__('Max two buttons.'))
                                        ->reorderable()
                                        ->maxItems(2)
                                        ->columnSpanFull()
                                        ->columns(2)
                                        ->schema([
                                            TextInput::make('hero.button_title')
                                                ->label(__('Button Title'))
                                                ->helperText(__('Max: 50 characters.'))
                                                ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                                ->required()
                                                ->maxLength(50),
                                            TextInput::make('hero.button_url')
                                                ->label(__('URL Link'))
                                                ->helperText(__('Max: 50 characters.'))
                                                ->prefixIcon('heroicon-o-link')
                                                ->required()
                                                ->maxLength(50),
                                            Select::make('hero.button_style')
                                                ->label(__('Button Style'))
                                                ->prefixIcon('heroicon-o-window')
                                                ->options([
                                                    'filled'   => __('Filled'),
                                                    'outlined' => __('Outlined'),
                                                ]),
                                            Select::make('hero.button_target')
                                                ->label(__('Target'))
                                                ->prefixIcon('heroicon-o-window')
                                                ->options([
                                                    '_self'  => __('Self'),
                                                    '_blank' => __('New'),
                                                ]),

                                        ]),
                                ]),

                            Section::make(__('Featured Image & Theme'))
                                ->icon('heroicon-o-sparkles')
                                ->collapsible()
                                ->columns(3)
                                ->schema([
                                    FileUpload::make('hero.featured_image')
                                        ->label('Featured Image')
                                        ->directory('hero')
                                        ->image()
                                        ->columnSpan(2)
                                        ->imageEditor()
                                        ->helperText(__('This is your featured image for the hero section.')),
                                    Select::make('hero.theme')
                                        ->label(__('Hero Section Theme'))
                                        ->prefixIcon('heroicon-o-window')
                                        ->options([
                                            'default' => __('Default'),
                                        ])
                                        ->default('default'),
                                ]),

                            // TextInput::make('hero.section_button_text')
                            //     ->label('Hero Section Button Text')
                            //     ->helperText('Max: 50 characters.')
                            //     ->maxLength(50),
                            // TextInput::make('hero_section_button_url')
                            //     ->label('Hero Section Button URL')
                            //     ->helperText('Use the full URL. Max: 255 characters.')
                            //     ->maxLength(255),
                            // TextInput::make('hero_alt_button_text')
                            //     ->label('Hero Section Alt Button Text')
                            //     ->helperText('Max: 50 characters.')
                            //     ->maxLength(50),
                            // TextInput::make('hero_alt_button_url')
                            //     ->label('Hero Section Alt Button URL')
                            //     ->url()
                            //     ->helperText('Use the full URL. Max: 255 characters.')
                            //     ->maxLength(255),
                            // Select::make('hero_button_link_target')
                            //     ->options([
                            //         '_self'  => 'Same Window',
                            //         '_blank' => 'New Window',
                            //     ])
                            //     ->label('Hero Section Button Link Target')
                            //     ->helperText('Choose the target for the button link.'),
                            // Select::make('hero_alt_button_link_target')
                            //     ->options([
                            //         '_self'  => 'Same Window',
                            //         '_blank' => 'New Window',
                            //     ])
                            //     ->label('Hero Section Alt Button Link Target')
                            //     ->helperText('Choose the target for the alt button link.'),

                            //     Group::make()
                            //         ->columns(2)
                            //         ->schema([
                            //             Toggle::make('hero_is_bg_visible')
                            //                 ->label('Show Background Image')
                            //                 ->helperText('Show or hide the background image.'),
                            //             FileUpload::make('hero_section_bg_image')
                            //                 ->label('Hero Section Background Image')
                            //                 ->directory('hero/bg')
                            //                 ->image()
                            //                 ->imageEditor()
                            //                 ->helperText('Upload a background image for the hero section.'),
                            //             Group::make()->columns(3)->schema([
                            //                 Select::make('hero_section_bg_position')
                            //                     ->options([
                            //                         'bg-center' => 'Center',
                            //                         'bg-top'    => 'Top',
                            //                         'bg-bottom' => 'Bottom',
                            //                         'bg-left'   => 'Left',
                            //                         'bg-right'  => 'Right',
                            //                     ])
                            //                     ->label('Background Image Position')
                            //                     ->helperText('Choose the position of the background image.'),
                            //                 Select::make('hero_section_bg_size')
                            //                     ->options([
                            //                         'bg-auto'    => 'Auto',
                            //                         'bg-cover'   => 'Cover',
                            //                         'bg-contain' => 'Contain',
                            //                     ])
                            //                     ->label('Background Image Size')
                            //                     ->helperText('Choose the size of the background image.'),
                            //                 Select::make('hero_section_bg_repeat')
                            //                     ->options([
                            //                         'bg-repeat'    => 'Repeat',
                            //                         'bg-no-repeat' => 'No Repeat',
                            //                         'bg-repeat-x'  => 'Repeat X',
                            //                         'bg-repeat-y'  => 'Repeat Y',
                            //                     ])
                            //                     ->label('Background Image Repeat')
                            //                     ->helperText('Choose the repeat of the background image.'),
                            //             ])->columnSpanFull(),
                            //         ])->columnSpanFull(),
                            //
                        ])->columns(2),
                ]),
        ]);
    }
}

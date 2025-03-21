<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
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
        return $form
            ->schema([
                Section::make()
                    ->columns(1)
                    ->schema([
                        Group::make()
                            ->relationship('module')
                            ->schema([
                                Checkbox::make('hero')
                                    ->label(__('Show Hero Section'))
                                    ->helperText(__('Show or hide the hero section on the website.')),
                            ]),
                    ]),
                Section::make(__('Hero Section'))
                    ->description(__('This section is used to display your hero section to the public.'))
                    ->collapsible()
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Group::make()
                            ->relationship('layout')
                            ->schema([
                                Group::make()
                                    ->columns(3)
                                    ->schema([
                                        Select::make('hero.theme')
                                            ->live()
                                            ->label(__('Theme'))
                                            ->helperText(__('Select the theme of your Hero Section.'))
                                            ->prefixIcon('heroicon-o-window')
                                            ->options([
                                                'sierra'  => __('Sierra'),
                                                'default' => __('Default'),
                                            ])
                                            ->default('sierra'),
                                        Checkbox::make('hero.is_filled')
                                            ->default(true)
                                            ->live()
                                            ->label(__('Fill Section Background'))
                                            ->helperText(__('Add a dark color to section. This can override the background image.')),
                                        Checkbox::make('hero.is_mailing_active')
                                            ->default(true)
                                            ->live()
                                            ->helperText(__('Enable the Mailing List Module on Hero Sections where this option is available.'))
                                            ->label(__('Show Mailing List Module')),
                                    ]),
                                Section::make(__('Info Bumper'))
                                    ->columns(3)
                                    ->description(__('A simple info bumper component.'))
                                    ->icon('heroicon-o-megaphone')
                                    ->collapsed()
                                    ->schema([
                                        Group::make()
                                            ->columns(3)
                                            ->columnSpanFull()
                                            ->schema([
                                                Checkbox::make('hero.bumper_is_active')
                                                    ->helperText(__('Active or Inactive.'))
                                                    ->label('Active')
                                                    ->default(true),
                                                Checkbox::make('hero.bumper_is_animated')
                                                    ->label('Animated')
                                                    ->helperText(__('Animated or Static.'))
                                                    ->default(true),
                                                Checkbox::make('hero.bumper_is_center')
                                                    ->helperText(__('Align to center.'))
                                                    ->label('Align to Center')
                                                    ->default(false),
                                            ]),
                                        TextInput::make('hero.bumper_tag')
                                            ->label(__('Tag'))
                                            ->prefixIcon('heroicon-o-tag')
                                            ->helperText(__('Featured Tag')),
                                        TextInput::make('hero.bumper_title')
                                            ->label(__('Title'))
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->helperText(__('Main content of the bumper.'))
                                            ->columnSpan(2),
                                        Group::make()
                                            ->columnSpanFull()
                                            ->columns(2)
                                            ->schema([
                                                TextInput::make('hero.bumper_icon')
                                                    ->label('Ionicon')
                                                    ->helperText(__('Ionicon.(Optional)'))
                                                    ->suffixIcon('heroicon-o-window')
                                                    ->prefix('ion-icon'),
                                                TextInput::make('hero.bumper_link')
                                                    ->label('Link')
                                                    ->prefixIcon('heroicon-o-link')
                                                    ->helperText(__('URL Link. (Optional)')),
                                                Select::make('hero.bumper_target')
                                                    ->label('Link Target')
                                                    ->prefixIcon('heroicon-o-window')
                                                    ->helperText(__('It opens in a new or same window.'))
                                                    ->options([
                                                        '_self'  => __('Self'),
                                                        '_blank' => __('New'),
                                                    ])
                                                    ->default('_self'),
                                                Select::make('hero.bumper_role')
                                                    ->label('Role')
                                                    ->prefixIcon('heroicon-o-bell')
                                                    ->helperText(__('Select a role of this bumper.'))
                                                    ->options([
                                                        'primary' => 'Primary',
                                                        'danger'  => 'Danger',
                                                        'info'    => 'Info',
                                                    ])
                                                    ->default('primary'),
                                            ]),
                                    ]),
                                Section::make(__('Title & Subtitle'))
                                    ->description(__('Configure the title and subtitle of your Hero Section'))
                                    ->icon('heroicon-o-bars-3-bottom-left')
                                    ->collapsed()
                                    ->schema([
                                        TextInput::make('hero.section_title')
                                            ->label(__('Hero Section Title'))
                                            ->helperText('💡 HTML allowed. Use the class "tl" to highlight a word in the title. Max: 140 characters.')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->columnSpanFull()
                                            ->placeholder(__('hackable ♠'))
                                            ->maxLength(140),
                                        TextInput::make('hero.section_subtitle')
                                            ->label('Hero Section Subtitle')
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->columnSpanFull()
                                            ->placeholder(__('hackable ♠'))
                                            ->helperText('💡 HTML allowed. Use the class "tl" to highlight a word in the title. Max: 160 characters.')
                                            ->maxLength(160),
                                    ]),
                                Section::make(__('Buttons'))
                                    ->description(__('A pair of buttons in your Hero Section.'))
                                    ->icon('heroicon-o-bolt')
                                    ->collapsed()
                                    ->schema([
                                        Repeater::make('hero.buttons')
                                            ->cloneable()
                                            ->label(__('Buttons'))
                                            ->itemLabel(function (array $state): string {
                                                $title = $state['button_title'] ?? __('Button');

                                                return preg_replace('/<.*?>.*?<\/.*?>/', '', $title);
                                            })
                                            ->helperText(__('Max two buttons.'))
                                            ->reorderable()
                                            ->maxItems(2)
                                            ->columnSpanFull()
                                            ->collapsed()
                                            ->columns(2)
                                            ->schema([
                                                TextInput::make('button_title')
                                                    ->label(__('Button Title'))
                                                    ->helperText(__('Max: 50 characters.'))
                                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                                    ->required()
                                                    ->maxLength(50),
                                                TextInput::make('button_url')
                                                    ->label(__('URL Link'))
                                                    ->helperText(__('Max: 140 characters.'))
                                                    ->prefixIcon('heroicon-o-link')
                                                    ->default('#')
                                                    ->maxLength(140),
                                                TextInput::make('icon')
                                                    ->label(__('Icon'))
                                                    ->helperText(__('Max: 140 characters.'))
                                                    ->prefixIcon('heroicon-o-cube')
                                                    ->maxLength(140),
                                                Select::make('button_style')
                                                    ->label(__('Button Style'))
                                                    ->prefixIcon('heroicon-o-window')
                                                    ->options([
                                                        'filled'   => __('Filled'),
                                                        'outlined' => __('Outlined'),
                                                    ])
                                                    ->default('filled'),
                                                Select::make('button_target')
                                                    ->label(__('Target'))
                                                    ->prefixIcon('heroicon-o-window')
                                                    ->options([
                                                        '_self'  => __('Self'),
                                                        '_blank' => __('New'),
                                                    ])
                                                    ->default('self'),
                                            ]),
                                    ]),
                                Section::make(__('Featured Image'))
                                    ->description(__('The featured image of your Hero Section.'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed()
                                    ->columns(3)
                                    ->schema([
                                        Checkbox::make('hero.featured_image_is_active')
                                            ->default(true)
                                            ->helperText(__('Show / hide featured image.'))
                                            ->label(__('Active')),
                                        FileUpload::make('hero.featured_image')
                                            ->label('Featured Image')
                                            ->directory('hero')
                                            ->columnSpan(2)
                                            ->imageEditor()
                                            ->helperText(__('💡 1200 x 600 px and 16:9 is the perfect match!')),
                                    ]),
                                Section::make(__('Background'))
                                    ->description(__('Controls for Background Image for your Hero Section.'))
                                    ->icon('heroicon-o-sparkles')
                                    ->collapsed()
                                    ->columns(2)
                                    ->schema([
                                        Checkbox::make('hero.is_active')
                                            ->label(__('Show Background Image'))
                                            ->helperText(__('Show or hide the background image.')),
                                        Checkbox::make('hero.is_highlight')
                                            ->label(__('Highlight Text'))
                                            ->helperText(__('Highlight the text in the hero section.')),
                                        Checkbox::make('hero.is_pattern_bg')
                                            ->label(__('Pattern Background'))
                                            ->helperText(__('Enable this option to show a pattern background in the hero section. This overrides the background image if uploaded.')),
                                        Radio::make('hero.pattern_name')
                                            ->options([
                                                'dot'   => 'Dot',
                                                'cross' => 'Cross',
                                            ])
                                            ->default('cross')
                                            ->label(__('Pattern Type')),
                                        FileUpload::make('hero.bg_image')
                                            ->label(__('Hero Section Background Image'))
                                            ->directory('hero/bg')
                                            ->image()
                                            ->columnSpanFull()
                                            ->imageEditor()
                                            ->helperText(__('Upload a background image for the hero section.')),
                                        Group::make()
                                            ->columns(3)
                                            ->columnSpanFull()
                                            ->schema([
                                                Checkbox::make('hero.is_upper')
                                                    ->label(__('Move to Upper'))
                                                    ->helperText(__('Move the background image to the upper side of website.')),
                                                Checkbox::make('hero.is_bg_grayscale')
                                                    ->columnSpan(2)
                                                    ->label(__('Grayscale'))
                                                    ->helperText(__('Enable this option to show the background image in grayscale.')),
                                                Select::make('hero.bg_position')
                                                    ->options([
                                                        'bg-center' => 'Center',
                                                        'bg-top'    => 'Top',
                                                        'bg-bottom' => 'Bottom',
                                                        'bg-left'   => 'Left',
                                                        'bg-right'  => 'Right',
                                                    ])
                                                    ->label(__('Position'))
                                                    ->helperText(__('Choose the position of the background image.')),
                                                Select::make('hero.bg_size')
                                                    ->options([
                                                        'bg-auto'    => 'Auto',
                                                        'bg-cover'   => 'Cover',
                                                        'bg-contain' => 'Contain',
                                                    ])
                                                    ->label(__('Size'))
                                                    ->helperText(__('Choose the size of the background image.')),
                                                Select::make('hero.bg_repeat')
                                                    ->options([
                                                        'bg-repeat'    => 'Repeat',
                                                        'bg-no-repeat' => 'No Repeat',
                                                        'bg-repeat-x'  => 'Repeat X',
                                                        'bg-repeat-y'  => 'Repeat Y',
                                                    ])
                                                    ->label(__('Repeat'))
                                                    ->helperText(__('Choose the repeat of the background image.')),
                                            ]),

                                    ]),
                                Section::make(__('Static Slider'))
                                    ->description(__('Activate a static slider under your Hero Section.'))
                                    ->icon('heroicon-o-photo')
                                    ->collapsed()
                                    ->columns(2)
                                    ->schema([
                                        Checkbox::make('hero.slider_is_active')
                                            ->label(__('Active'))
                                            ->helperText(__('Enable this static slider in your Hero Section.')),
                                        Checkbox::make('hero.is_invert')
                                            ->default(true)
                                            ->label(__('Invert Filter'))
                                            ->helperText(__('When enabled, invert the color of image in dark mode. If the image is black in white mode, turns to white in dark mode.')),
                                        Repeater::make('hero.slider_content')
                                            ->columnSpanFull()
                                            ->cloneable()
                                            ->columns(2)
                                            ->collapsed()
                                            ->label(__('Items'))
                                            ->schema([
                                                FileUpload::make('hero.slider_image')
                                                    ->label(__('Image'))
                                                    ->required()
                                                    ->helperText(__('PNG format will look great.')),
                                                Group::make()
                                                    ->schema([
                                                        TextInput::make('hero.slider_link')
                                                            ->label(__('Link (Optional)'))
                                                            ->helperText(__('URL Link.'))
                                                            ->columnSpan(2)
                                                            ->prefixIcon('heroicon-o-link'),
                                                        Checkbox::make('hero.is_new_window')
                                                            ->label(__('New Window'))
                                                            ->default(false),
                                                    ]),

                                            ]),
                                    ]),
                            ]),
                    ]),

            ]);
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroResource\Pages;
use App\Filament\Resources\HeroResource\RelationManagers;
use App\Models\Hero;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function getNavigationLabel(): string
    {
        return __('Hero Section');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Hero Section');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Website Design');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Manager your Hero Section from your website.');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        Toggle::make('is_active')
                            ->label(__('Active'))
                            ->default(false)
                            ->helperText(__('Show or hide the hero section on the website.'))
                            ->afterStateUpdated(function ($set, $state, $get, $record) {
                                if ($state && $record) {
                                    // Quando ativado, desativa todos os outros heroes
                                    Hero::where('id', '!=', $record->id)
                                        ->update(['is_active' => false]);
                                }
                            })
                            ->live(),
                        TextInput::make('title')
                            ->label(__('Hero Section Title'))
                            ->helperText(__('Title of the hero section.'))
                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                            ->placeholder(__('Hero Section Title'))
                            ->maxLength(140)
                            ->required(),
                    ]),
                Group::make()
                    ->columnSpanFull()
                    ->schema([
                        Tabs::make('hero_tabs')
                            ->persistTab()
                            ->persistTabInQueryString('id')
                            ->tabs([
                                Tab::make(__('General'))
                                    ->icon('heroicon-o-cog')
                                    ->schema([
                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                Radio::make('content.theme')
                                                    ->live()
                                                    ->label(__('Theme'))
                                                    ->options([
                                                        'default' => __('Default'),
                                                        'sierra'  => __('Sierra'),
                                                    ])
                                                    ->default('sierra')
                                                    ->helperText(__('Choose the visual theme for the Hero section.')),
                                                Checkbox::make('content.is_filled')
                                                    ->default(false)
                                                    ->live()
                                                    ->label(__('Fill Section Background'))
                                                    ->helperText(__('Add a dark color to section. This can override the background image.')),
                                            ]),
                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                Checkbox::make('content.social_network_module_is_active')
                                                    ->default(false)
                                                    ->live()
                                                    ->label(__('Social Network Module'))
                                                    ->helperText(__('Enable the Social Network Module on Hero Sections where this option is available.')),

                                                Checkbox::make('content.is_mailing_active')
                                                    ->default(false)
                                                    ->live()
                                                    ->label(__('Mailing List Module'))
                                                    ->helperText(__('Enable the Mailing List Module on Hero Sections where this option is available.')),
                                            ]),
                                    ]),
                                Tab::make(__('Heading'))
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        Group::make()
                                            ->columnSpanFull()
                                            ->schema([
                                                TextInput::make('content.section_title')
                                                    ->label(__('Hero Section Title'))
                                                    ->helperText('💡 Use gradient class e.g: tl or dg to highlight a word. Limit 140 characters.')
                                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                                    ->columnSpanFull()
                                                    ->placeholder(__('hackable ♠'))
                                                    ->maxLength(140),
                                                TextInput::make('content.section_subtitle')
                                                    ->label('Hero Section Subtitle')
                                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                                    ->columnSpanFull()
                                                    ->placeholder(__('hackable ♠'))
                                                    ->helperText('💡 Use gradient class e.g: tl or dg to highlight a word. Limit 140 characters.')
                                                    ->maxLength(140),
                                            ]),
                                    ]),
                                Tab::make(__('Buttons'))
                                    ->icon('heroicon-o-bolt')
                                    ->schema([
                                        Group::make()
                                            ->columns(1)
                                            ->schema([
                                                Repeater::make('content.buttons')
                                                    ->cloneable()
                                                    ->label(__('Call to Action Buttons'))
                                                    ->itemLabel(function (array $state): string {
                                                        $title = $state['button_title'] ?? __('Button');
                                                        $style = $state['button_style'] ?? 'filled';
                                                        $icon = isset($state['icon']) && ! empty($state['icon']) ? '⚡ ' : '';

                                                        return $icon.$title.' ('.__(ucfirst($style)).')';
                                                    })
                                                    ->collapsible()
                                                    ->collapsed()
                                                    ->reorderable()
                                                    ->maxItems(4)
                                                    ->helperText(__('Add up to 4 call-to-action buttons. Pro tip: Use 1-2 buttons for better conversion.'))
                                                    ->columns(2)
                                                    ->schema([
                                                        Group::make()
                                                            ->columnSpan(2)
                                                            ->columns(2)
                                                            ->schema([
                                                                TextInput::make('button_title')
                                                                    ->label(__('Button Text'))
                                                                    ->helperText(__('The text displayed on the button.'))
                                                                    ->placeholder('Get Started')
                                                                    ->prefixIcon('heroicon-o-cursor-arrow-rays')
                                                                    ->maxLength(50),
                                                                TextInput::make('button_url')
                                                                    ->label(__('Link URL'))
                                                                    ->helperText(__('Where the button will link to.'))
                                                                    ->placeholder('/contact or https://example.com')
                                                                    ->prefixIcon('heroicon-o-link')
                                                                    ->default('#')
                                                                    ->maxLength(140),
                                                            ]),
                                                        Group::make()
                                                            ->columnSpan(2)
                                                            ->columns(2)
                                                            ->schema([
                                                                Select::make('button_style')
                                                                    ->label(__('Button Style'))
                                                                    ->helperText(__('Visual appearance of the button.'))
                                                                    ->prefixIcon('heroicon-o-swatch')
                                                                    ->options([
                                                                        'primary'   => __('Primary'),
                                                                        'secondary' => __('Secondary'),
                                                                        'ghost'     => __('Ghost (Transparent)'),
                                                                        'outlined'  => __('Outlined'),
                                                                    ])
                                                                    ->default('primary'),
                                                                Select::make('button_target')
                                                                    ->label(__('Open In'))
                                                                    ->helperText(__('How the link will open.'))
                                                                    ->prefixIcon('heroicon-o-arrow-top-right-on-square')
                                                                    ->options([
                                                                        '_self'  => __('Same Window'),
                                                                        '_blank' => __('New Window/Tab'),
                                                                    ])
                                                                    ->default('_self'),
                                                            ]),
                                                        Group::make()
                                                            ->columnSpan(2)
                                                            ->columns(2)
                                                            ->schema([
                                                                TextInput::make('icon')
                                                                    ->label(__('Icon (Optional)'))
                                                                    ->helperText(__('Add an Ionicon for visual emphasis.'))
                                                                    ->placeholder('arrow-forward-outline')
                                                                    ->prefixIcon('heroicon-o-bolt'),
                                                                Checkbox::make('icon_before')
                                                                    ->label(__('Icon Before Text'))
                                                                    ->helperText(__('Display the icon before the button text.'))
                                                                    ->default(true),
                                                            ]),
                                                    ]),
                                            ]),
                                    ]),
                                Tab::make(__('Bumper'))
                                    ->icon('heroicon-o-megaphone')
                                    ->schema([
                                        Group::make()
                                            ->columns(3)
                                            ->schema([
                                                Checkbox::make('content.bumper_is_active')
                                                    ->helperText(__('Show or hide the bumper.'))
                                                    ->label(__('Active'))
                                                    ->default(false),
                                                Checkbox::make('content.bumper_is_animated')
                                                    ->label(__('Animated'))
                                                    ->helperText(__('Add animation effect to the bumper.'))
                                                    ->default(false),
                                                Checkbox::make('content.bumper_is_center')
                                                    ->helperText(__('Center align the bumper content.'))
                                                    ->label(__('Center Alignment'))
                                                    ->default(false),
                                            ]),
                                        Group::make()
                                            ->columns(3)
                                            ->schema([
                                                TextInput::make('content.bumper_tag')
                                                    ->label(__('Tag'))
                                                    ->prefixIcon('heroicon-o-tag')
                                                    ->placeholder('New')
                                                    ->helperText(__('Small tag text displayed in the bumper.')),
                                                TextInput::make('content.bumper_title')
                                                    ->label(__('Title'))
                                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                                    ->placeholder('Bumper title 🎉')
                                                    ->helperText(__('Main content of the bumper.'))
                                                    ->columnSpan(2),
                                            ]),
                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                TextInput::make('content.bumper_icon')
                                                    ->label(__('Icon'))
                                                    ->helperText(__('Ionicon name (without ion-icon prefix).'))
                                                    ->placeholder('sparkles-outline')
                                                    ->prefixIcon('heroicon-o-cube'),
                                                TextInput::make('content.bumper_link')
                                                    ->label(__('Link URL'))
                                                    ->prefixIcon('heroicon-o-link')
                                                    ->placeholder('https://example.com')
                                                    ->helperText(__('URL the bumper will link to (optional).')),
                                            ]),
                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                Select::make('content.bumper_target')
                                                    ->label(__('Link Target'))
                                                    ->prefixIcon('heroicon-o-arrow-top-right-on-square')
                                                    ->helperText(__('How the link will open when clicked.'))
                                                    ->options([
                                                        '_self'  => __('Same Window'),
                                                        '_blank' => __('New Window'),
                                                    ])
                                                    ->default('_self'),
                                                Select::make('content.bumper_role')
                                                    ->label(__('Style'))
                                                    ->prefixIcon('heroicon-o-swatch')
                                                    ->helperText(__('Visual style of the bumper.'))
                                                    ->options([
                                                        'primary' => __('Primary'),
                                                        'danger'  => __('Danger'),
                                                        'info'    => __('Info'),
                                                    ])
                                                    ->default('primary'),
                                            ]),
                                    ]),
                                Tab::make(__('Featured Image'))
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        Group::make()
                                            ->columns(3)
                                            ->schema([
                                                Checkbox::make('content.featured_image_is_active')
                                                    ->default(false)
                                                    ->helperText(__('Show / hide featured image.'))
                                                    ->label(__('Active')),
                                                Checkbox::make('content.browser_border_is_active')
                                                    ->default(false)
                                                    ->helperText(__('Enable this option to display a mockup around the featured image. Applicable only for themes that support browser borders.'))
                                                    ->label(__('Browser Mockup')),
                                                Radio::make('content.browser_border_device')
                                                    ->options([
                                                        'browser' => __('Desktop'),
                                                        'mobile'  => __('Mobile'),
                                                    ])
                                                    ->default('browser')
                                                    ->label(__('Browser Device'))
                                                    ->helperText(__('The device type for the browser border.')),
                                            ]),
                                        TextInput::make('content.browser_border_url')
                                            ->label(__('Browser Border URL'))
                                            ->helperText(__('URL of the browser border image. Active when featured image has uploaded file.'))
                                            ->columnSpanFull()
                                            ->prefixIcon('heroicon-o-link'),
                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                FileUpload::make('content.featured_image')
                                                    ->label('Featured Image')
                                                    ->directory('hero')
                                                    ->image()
                                                    ->disk('public')
                                                    ->visibility('public')
                                                    ->maxFiles(1)
                                                    ->imageEditor()
                                                    ->imageEditorAspectRatios([
                                                        '16:9' => '16:9',
                                                        '9:16' => '9:16',
                                                        '4:3'  => '4:3',
                                                        '3:2'  => '3:2',
                                                        '2:1'  => '2:1',
                                                        '1:1'  => '1:1',
                                                    ])
                                                    ->helperText(__('16:9 for browser and 9:16 for mobile is recommended.')),
                                                FileUpload::make('content.dark_mode_featured_image')
                                                    ->label('Featured Image for Dark Mode')
                                                    ->directory('hero')
                                                    ->disk('public')
                                                    ->visibility('public')
                                                    ->image()
                                                    ->maxFiles(1)
                                                    ->imageEditor()
                                                    ->imageEditorAspectRatios([
                                                        '16:9' => '16:9',
                                                        '9:16' => '9:16',
                                                        '4:3'  => '4:3',
                                                        '3:2'  => '3:2',
                                                        '2:1'  => '2:1',
                                                        '1:1'  => '1:1',
                                                    ])
                                                    ->helperText(__('16:9 for browser and 9:16 for mobile is recommended.')),
                                            ]),
                                    ]),
                                Tab::make(__('Background Image'))
                                    ->icon('heroicon-o-rectangle-stack')
                                    ->schema([
                                        Group::make()
                                            ->columns(3)
                                            ->schema([
                                                Checkbox::make('content.is_active')
                                                    ->label(__('Enable Background Image'))
                                                    ->default(false)
                                                    ->helperText(__('Show or hide the background image in the hero section.')),
                                                Checkbox::make('content.is_upper')
                                                    ->label(__('Position at Top'))
                                                    ->helperText(__('Move the background image to the upper portion of the section.'))
                                                    ->default(false),
                                                Checkbox::make('content.is_highlight')
                                                    ->label(__('Highlight Content'))
                                                    ->default(false)
                                                    ->helperText(__('Add contrast to make text more visible over the background.')),
                                            ]),
                                        Tabs::make('background_image_tabs')
                                            ->columnSpanFull()
                                            ->tabs([
                                                Tab::make(__('Image'))
                                                    ->icon('heroicon-o-photo')
                                                    ->schema([
                                                        FileUpload::make('content.bg_image')
                                                            ->label(__('Background Image'))
                                                            ->directory('hero/bg')
                                                            ->image()
                                                            ->disk('public')
                                                            ->visibility('public')
                                                            ->maxFiles(1)
                                                            ->columnSpanFull()
                                                            ->imageEditor()
                                                            ->imageEditorAspectRatios([
                                                                '16:9' => '16:9',
                                                                '21:9' => '21:9 (Ultrawide)',
                                                                '4:3'  => '4:3',
                                                                '3:2'  => '3:2',
                                                                '2:1'  => '2:1',
                                                            ])
                                                            ->helperText(__('Recommended size: 1920×1080px (16:9) or 1920×900px (21:9). Use high quality images for best results.')),
                                                    ]),
                                                Tab::make(__('Basic Settings'))
                                                    ->icon('heroicon-o-adjustments-horizontal')
                                                    ->schema([
                                                        Group::make()
                                                            ->columns(2)
                                                            ->schema([
                                                                Select::make('content.bg_position')
                                                                    ->options([
                                                                        'bg-center' => __('Center (Recommended)'),
                                                                        'bg-top'    => __('Top'),
                                                                        'bg-bottom' => __('Bottom'),
                                                                        'bg-left'   => __('Left'),
                                                                        'bg-right'  => __('Right'),
                                                                    ])
                                                                    ->default('bg-center')
                                                                    ->label(__('Position'))
                                                                    ->helperText(__('How the image is positioned within its container.')),
                                                                Select::make('content.bg_size')
                                                                    ->options([
                                                                        'bg-cover'   => __('Cover (Recommended)'),
                                                                        'bg-contain' => __('Contain'),
                                                                        'bg-auto'    => __('Auto'),
                                                                    ])
                                                                    ->default('bg-cover')
                                                                    ->label(__('Size'))
                                                                    ->helperText(__('How the image fills the available space.')),
                                                            ]),
                                                        Group::make()
                                                            ->columns(2)
                                                            ->schema([
                                                                Select::make('content.bg_repeat')
                                                                    ->options([
                                                                        'bg-no-repeat' => __('No Repeat (Recommended)'),
                                                                        'bg-repeat'    => __('Tile in All Directions'),
                                                                        'bg-repeat-x'  => __('Repeat Horizontally'),
                                                                        'bg-repeat-y'  => __('Repeat Vertically'),
                                                                    ])
                                                                    ->default('bg-no-repeat')
                                                                    ->label(__('Repeat'))
                                                                    ->helperText(__('Whether and how the image should repeat.')),
                                                                Checkbox::make('content.is_bg_grayscale')
                                                                    ->label(__('Grayscale Effect'))
                                                                    ->helperText(__('Convert the image to black and white.')),
                                                            ]),
                                                    ]),
                                                Tab::make(__('Visual Effects'))
                                                    ->icon('heroicon-o-sparkles')
                                                    ->schema([
                                                        Group::make()
                                                            ->columns(2)
                                                            ->schema([
                                                                Checkbox::make('content.is_bg_blur')
                                                                    ->label(__('Blur Effect'))
                                                                    ->default(false)
                                                                    ->helperText(__('Add a subtle blur to the background image.')),
                                                                Checkbox::make('content.is_overlay_active')
                                                                    ->label(__('Dark Overlay'))
                                                                    ->default(false)
                                                                    ->helperText(__('Add a semi-transparent dark layer over the image for better readability.')),
                                                            ]),
                                                        Radio::make('content.bg_overlay')
                                                            ->options([
                                                                'hero-bg-overlay-default' => __('Light (25% opacity)'),
                                                                'hero-bg-overlay-middle'  => __('Medium (50% opacity)'),
                                                                'hero-bg-overlay-down'    => __('Heavy (75% opacity)'),
                                                            ])
                                                            ->default('hero-bg-overlay-default')
                                                            ->label(__('Overlay Intensity'))
                                                            ->visible(fn ($get) => $get('content.is_overlay_active'))
                                                            ->helperText(__('Control the darkness level of the overlay.')),
                                                    ]),
                                                Tab::make(__('Pattern Background'))
                                                    ->icon('heroicon-o-squares-2x2')
                                                    ->schema([
                                                        Group::make()
                                                            ->columns(1)
                                                            ->schema([
                                                                Checkbox::make('content.is_pattern_bg')
                                                                    ->label(__('Use Pattern Background'))
                                                                    ->default(false)
                                                                    ->helperText(__('Enable to use a repeating pattern instead of an image.'))
                                                                    ->live()
                                                                    ->afterStateUpdated(function ($set, $state) {
                                                                        if ($state) {
                                                                            $set('content.is_active', true);
                                                                            $set('content.bg_repeat', 'bg-repeat');
                                                                            $set('content.bg_position', 'bg-center');
                                                                            $set('content.bg_size', 'bg-auto');
                                                                            $set('content.is_overlay_active', true);
                                                                            $set('content.bg_overlay', 'hero-bg-overlay-default');
                                                                        } else {
                                                                            $set('content.bg_repeat', 'bg-no-repeat');
                                                                            $set('content.bg_position', 'bg-center');
                                                                            $set('content.bg_size', 'bg-cover');
                                                                        }
                                                                    }),
                                                                Radio::make('content.pattern_name')
                                                                    ->options([
                                                                        'dot'   => __('Dots Pattern'),
                                                                        'cross' => __('Crosses Pattern'),
                                                                    ])
                                                                    ->default('cross')
                                                                    ->label(__('Pattern Style'))
                                                                    ->visible(fn ($get) => $get('content.is_pattern_bg'))
                                                                    ->helperText(__('Choose the pattern to use as background.')),
                                                            ]),
                                                    ]),
                                            ]),
                                        Forms\Components\Placeholder::make('pattern_notice')
                                            ->label(__('Pattern Background Active'))
                                            ->content(__('Pattern background is currently enabled. The pattern will repeat across the entire hero section.'))
                                            ->columnSpanFull()
                                            ->visible(fn ($get) => $get('content.is_pattern_bg')),
                                    ]),
                                Tab::make(__('Static Slider'))
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        Group::make()
                                            ->columns(3)
                                            ->schema([
                                                Checkbox::make('content.slider_is_active')
                                                    ->label(__('Enable Slider'))
                                                    ->helperText(__('Show or hide the slider in the Hero Section.'))
                                                    ->default(false),
                                                Checkbox::make('content.is_invert')
                                                    ->default(false)
                                                    ->label(__('Dark Mode Color Inversion'))
                                                    ->helperText(__('Automatically inverts image colors in dark mode for better contrast.')),
                                                Checkbox::make('content.is_marquee')
                                                    ->default(false)
                                                    ->label(__('Marquee Effect'))
                                                    ->helperText(__('Enable continuous scrolling animation for logos.'))
                                                    ->live(),
                                            ]),
                                        Group::make()
                                            ->columns(2)
                                            ->visible(fn ($get) => $get('content.is_marquee'))
                                            ->schema([
                                                Select::make('content.marquee_speed')
                                                    ->label(__('Marquee Speed'))
                                                    ->options([
                                                        'slow'   => __('Slow'),
                                                        'normal' => __('Normal'),
                                                        'fast'   => __('Fast'),
                                                    ])
                                                    ->default('normal')
                                                    ->helperText(__('Control the scrolling speed of the marquee.')),
                                                Select::make('content.marquee_direction')
                                                    ->label(__('Marquee Direction'))
                                                    ->options([
                                                        'left'  => __('Left to Right'),
                                                        'right' => __('Right to Left'),
                                                    ])
                                                    ->default('left')
                                                    ->helperText(__('Direction of the marquee scrolling.')),
                                            ]),
                                        Section::make(__('Slider Content'))
                                            ->description(__('Manage the images that appear in your slider.'))
                                            ->icon('heroicon-o-film')
                                            ->collapsible(false)
                                            ->schema([
                                                Repeater::make('content.slider_content')
                                                    ->columns(1)
                                                    ->cloneable()
                                                    ->maxItems(6)
                                                    ->reorderable()
                                                    ->itemLabel(function (array $state): string {
                                                        return $state['slider_title'] ?? __('Slide Item');
                                                    })
                                                    ->collapsible()
                                                    ->collapsed()
                                                    ->label(__('Slider Images'))
                                                    ->helperText(__('Add images to be displayed in the slider (up to 6 items). For best results, use images with the same dimensions.'))
                                                    ->schema([
                                                        Group::make()
                                                            ->schema([
                                                                TextInput::make('slider_title')
                                                                    ->label(__('Slide Title'))
                                                                    ->helperText(__('Used for administrative purposes and alt text.'))
                                                                    ->placeholder(__('Product Showcase'))
                                                                    ->prefixIcon('heroicon-o-document-text')
                                                                    ->maxLength(50)
                                                                    ->columnSpanFull(),
                                                                FileUpload::make('slider_image')
                                                                    ->label(__('Slide Image'))
                                                                    ->directory('hero/slider')
                                                                    ->disk('public')
                                                                    ->visibility('public')
                                                                    ->image()
                                                                    ->imageEditor()
                                                                    ->imageEditorAspectRatios([
                                                                        '16:9' => __('16:9 (Widescreen)'),
                                                                        '4:3'  => __('4:3 (Standard)'),
                                                                        '3:2'  => __('3:2 (Classic)'),
                                                                        '1:1'  => __('1:1 (Square)'),
                                                                    ])
                                                                    ->columnSpanFull()
                                                                    ->helperText(__('Recommended size: 1920×1080px (16:9). Use high-quality images for best results.')),

                                                                Group::make()
                                                                    ->columns(2)
                                                                    ->schema([
                                                                        TextInput::make('slider_link')
                                                                            ->label(__('Link URL (Optional)'))
                                                                            ->helperText(__('Where the slide will link to when clicked.'))
                                                                            ->placeholder('https://example.com/product')
                                                                            ->prefixIcon('heroicon-o-link'),
                                                                        Checkbox::make('is_new_window')
                                                                            ->label(__('Open in New Tab'))
                                                                            ->helperText(__('When enabled, the link opens in a new browser tab.'))
                                                                            ->default(false),
                                                                    ]),
                                                                Group::make()
                                                                    ->columns(2)
                                                                    ->schema([
                                                                        TextInput::make('caption')
                                                                            ->label(__('Caption (Optional)'))
                                                                            ->helperText(__('Short text displayed on the slide.'))
                                                                            ->placeholder(__('Latest Product Release'))
                                                                            ->prefixIcon('heroicon-o-chat-bubble-bottom-center-text'),
                                                                        Select::make('overlay')
                                                                            ->label(__('Overlay'))
                                                                            ->options([
                                                                                'none'   => __('None'),
                                                                                'light'  => __('Light (25%)'),
                                                                                'medium' => __('Medium (50%)'),
                                                                                'dark'   => __('Dark (75%)'),
                                                                            ])
                                                                            ->default('none')
                                                                            ->helperText(__('Add a dark overlay to improve text readability.')),
                                                                    ]),
                                                            ]),
                                                    ])
                                                    ->defaultItems(0)
                                                    ->maxItems(10),
                                            ]),
                                    ]),
                            ])->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label(__('Status'))
                    ->afterStateUpdated(function ($record, $state) {
                        if ($state) {
                            // Quando ativado, desativa todos os outros heroes
                            Hero::where('id', '!=', $record->id)
                                ->update(['is_active' => false]);
                        }
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index'  => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'edit'   => Pages\EditHero::route('/{record}/edit'),
        ];
    }
}

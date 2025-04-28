<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
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

                Group::make()
                    ->relationship('layout')
                    ->columnSpanFull()
                    ->schema([
                        Tabs::make('hero_tabs')
                            ->tabs([
                                Tab::make(__('General'))
                                    ->icon('heroicon-o-cog')
                                    ->schema([
                                        Group::make()
                                            ->columns(4)
                                            ->schema([
                                                Radio::make('hero.theme')
                                                    ->live()
                                                    ->label(__('Theme'))
                                                    ->options([
                                                        'default' => __('Default'),
                                                        'sierra'  => __('Sierra'),
                                                    ])
                                                    ->default('sierra'),
                                                Checkbox::make('hero.is_filled')
                                                    ->default(true)
                                                    ->live()
                                                    ->label(__('Fill Section Background'))
                                                    ->helperText(__('Add a dark color to section. This can override the background image.')),
                                                Checkbox::make('hero.social_network_module_is_active')
                                                    ->default(true)
                                                    ->live()
                                                    ->helperText(__('Enable the Social Network Module on Hero Sections where this option is available.'))
                                                    ->label(__('Social Network Module')),
                                                Checkbox::make('hero.is_mailing_active')
                                                    ->default(true)
                                                    ->live()
                                                    ->helperText(__('Enable the Mailing List Module on Hero Sections where this option is available.'))
                                                    ->label(__('Mailing List Module')),
                                            ]),
                                    ]),

                                Tab::make(__('Content'))
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        Group::make()
                                            ->columnSpanFull()
                                            ->schema([
                                                TextInput::make('hero.section_title')
                                                    ->label(__('Hero Section Title'))
                                                    ->helperText('💡 Use gradient class e.g: tl or dg to highlight a word. Limit 140 characters.')
                                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                                    ->columnSpanFull()
                                                    ->placeholder(__('hackable ♠'))
                                                    ->maxLength(140),
                                                TextInput::make('hero.section_subtitle')
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
                                                Repeater::make('hero.buttons')
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
                                                                    ->required()
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
                                                                        'filled'   => __('Filled (Primary)'),
                                                                        'outlined' => __('Outlined (Secondary)'),
                                                                    ])
                                                                    ->default('filled'),
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
                                                                Checkbox::make('color')
                                                                    ->label(__('Use Primary Color'))
                                                                    ->helperText(__('Enable to use the primary theme color for this button.'))
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
                                                Checkbox::make('hero.bumper_is_active')
                                                    ->helperText(__('Show or hide the bumper.'))
                                                    ->label(__('Active'))
                                                    ->default(true),
                                                Checkbox::make('hero.bumper_is_animated')
                                                    ->label(__('Animated'))
                                                    ->helperText(__('Add animation effect to the bumper.'))
                                                    ->default(true),
                                                Checkbox::make('hero.bumper_is_center')
                                                    ->helperText(__('Center align the bumper content.'))
                                                    ->label(__('Center Alignment'))
                                                    ->default(false),
                                            ]),

                                        Group::make()
                                            ->columns(3)
                                            ->schema([
                                                TextInput::make('hero.bumper_tag')
                                                    ->label(__('Tag'))
                                                    ->prefixIcon('heroicon-o-tag')
                                                    ->placeholder('New')
                                                    ->helperText(__('Small tag text displayed in the bumper.')),
                                                TextInput::make('hero.bumper_title')
                                                    ->label(__('Title'))
                                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                                    ->placeholder('Warriorfolio v2.1.4 is here 🎉')
                                                    ->helperText(__('Main content of the bumper.'))
                                                    ->columnSpan(2),
                                            ]),

                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                TextInput::make('hero.bumper_icon')
                                                    ->label(__('Icon'))
                                                    ->helperText(__('Ionicon name (without ion-icon prefix).'))
                                                    ->placeholder('sparkles-outline')
                                                    ->prefixIcon('heroicon-o-cube'),
                                                TextInput::make('hero.bumper_link')
                                                    ->label(__('Link URL'))
                                                    ->prefixIcon('heroicon-o-link')
                                                    ->placeholder('https://example.com')
                                                    ->helperText(__('URL the bumper will link to (optional).')),
                                            ]),

                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                Select::make('hero.bumper_target')
                                                    ->label(__('Link Target'))
                                                    ->prefixIcon('heroicon-o-arrow-top-right-on-square')
                                                    ->helperText(__('How the link will open when clicked.'))
                                                    ->options([
                                                        '_self'  => __('Same Window'),
                                                        '_blank' => __('New Window'),
                                                    ])
                                                    ->default('_self'),
                                                Select::make('hero.bumper_role')
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
                                                Checkbox::make('hero.featured_image_is_active')
                                                    ->default(true)
                                                    ->helperText(__('Show / hide featured image.'))
                                                    ->label(__('Active')),
                                                Checkbox::make('hero.browser_border_is_active')
                                                    ->default(true)
                                                    ->helperText(__('Enable this option to display a mockup around the featured image. Applicable only for themes that support browser borders.'))
                                                    ->label(__('Browser Mockup')),
                                                Radio::make('hero.browser_border_device')
                                                    ->options([
                                                        'browser' => __('Desktop'),
                                                        'mobile'  => __('Mobile'),
                                                    ])
                                                    ->default('browser')
                                                    ->label(__('Browser Device'))
                                                    ->helperText(__('The device type for the browser border.')),
                                            ]),
                                        TextInput::make('hero.browser_border_url')
                                            ->label(__('Browser Border URL'))
                                            ->helperText(__('URL of the browser border image. Active when featured image has uploaded file.'))
                                            ->columnSpanFull()
                                            ->prefixIcon('heroicon-o-link'),
                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                FileUpload::make('hero.featured_image')
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
                                                FileUpload::make('hero.dark_mode_featured_image')
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
                                                Checkbox::make('hero.is_active')
                                                    ->label(__('Enable Background Image'))
                                                    ->default(true)
                                                    ->helperText(__('Show or hide the background image in the hero section.')),
                                                Checkbox::make('hero.is_upper')
                                                    ->label(__('Position at Top'))
                                                    ->helperText(__('Move the background image to the upper portion of the section.'))
                                                    ->default(false),
                                                Checkbox::make('hero.is_highlight')
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
                                                        FileUpload::make('hero.bg_image')
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
                                                                Select::make('hero.bg_position')
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
                                                                Select::make('hero.bg_size')
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
                                                                Select::make('hero.bg_repeat')
                                                                    ->options([
                                                                        'bg-no-repeat' => __('No Repeat (Recommended)'),
                                                                        'bg-repeat'    => __('Tile in All Directions'),
                                                                        'bg-repeat-x'  => __('Repeat Horizontally'),
                                                                        'bg-repeat-y'  => __('Repeat Vertically'),
                                                                    ])
                                                                    ->default('bg-no-repeat')
                                                                    ->label(__('Repeat'))
                                                                    ->helperText(__('Whether and how the image should repeat.')),
                                                                Checkbox::make('hero.is_bg_grayscale')
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
                                                                Checkbox::make('hero.is_bg_blur')
                                                                    ->label(__('Blur Effect'))
                                                                    ->default(true)
                                                                    ->helperText(__('Add a subtle blur to the background image.')),
                                                                Checkbox::make('hero.is_overlay_active')
                                                                    ->label(__('Dark Overlay'))
                                                                    ->default(true)
                                                                    ->helperText(__('Add a semi-transparent dark layer over the image for better readability.')),
                                                            ]),

                                                        Radio::make('hero.bg_overlay')
                                                            ->options([
                                                                'hero-bg-overlay-default' => __('Light (25% opacity)'),
                                                                'hero-bg-overlay-middle'  => __('Medium (50% opacity)'),
                                                                'hero-bg-overlay-down'    => __('Heavy (75% opacity)'),
                                                            ])
                                                            ->default('hero-bg-overlay-default')
                                                            ->label(__('Overlay Intensity'))
                                                            ->visible(fn ($get) => $get('hero.is_overlay_active'))
                                                            ->helperText(__('Control the darkness level of the overlay.')),
                                                    ]),

                                                Tab::make(__('Pattern Background'))
                                                    ->icon('heroicon-o-squares-2x2')
                                                    ->schema([
                                                        Group::make()
                                                            ->columns(1)
                                                            ->schema([
                                                                Checkbox::make('hero.is_pattern_bg')
                                                                    ->label(__('Use Pattern Background'))
                                                                    ->default(false)
                                                                    ->helperText(__('Enable to use a repeating pattern instead of an image.'))
                                                                    ->live()
                                                                    ->afterStateUpdated(function ($set, $state) {
                                                                        if ($state) {
                                                                            // Se o pattern for ativado, configurar automaticamente os valores recomendados
                                                                            $set('hero.is_active', true); // Ativar Background Image
                                                                            $set('hero.bg_repeat', 'bg-repeat'); // Repetir em todas as direções
                                                                            $set('hero.bg_position', 'bg-center'); // Posição centralizada
                                                                            $set('hero.bg_size', 'bg-auto'); // Tamanho automático
                                                                            $set('hero.is_overlay_active', true); // Ativar overlay
                                                                            $set('hero.bg_overlay', 'hero-bg-overlay-default'); // Definir overlay como o mais leve
                                                                        } else {
                                                                            // Quando desativado, retornar aos valores padrão para imagem de fundo
                                                                            $set('hero.bg_repeat', 'bg-no-repeat'); // Não repetir
                                                                            $set('hero.bg_position', 'bg-center'); // Posição centralizada
                                                                            $set('hero.bg_size', 'bg-cover'); // Tamanho cover (preencher)
                                                                        }
                                                                    }),

                                                                Radio::make('hero.pattern_name')
                                                                    ->options([
                                                                        'dot'   => __('Dots Pattern'),
                                                                        'cross' => __('Crosses Pattern'),
                                                                    ])
                                                                    ->default('cross')
                                                                    ->label(__('Pattern Style'))
                                                                    ->visible(fn ($get) => $get('hero.is_pattern_bg'))
                                                                    ->helperText(__('Choose the pattern to use as background.')),
                                                            ]),
                                                    ]),
                                            ]),

                                        \Filament\Forms\Components\View::make('components.filament.pattern-active-notice')
                                            ->columnSpanFull()
                                            ->visible(fn ($get) => $get('hero.is_pattern_bg'))
                                            ->extraAttributes(['class' => 'mt-2 border-t border-secondary-300 dark:border-secondary-700 rounded-b-lg']),
                                    ]),

                                Tab::make(__('Slider'))
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                Checkbox::make('hero.slider_is_active')
                                                    ->label(__('Enable Slider'))
                                                    ->helperText(__('Show or hide the slider in the Hero Section.'))
                                                    ->default(true),
                                                Checkbox::make('hero.is_invert')
                                                    ->default(true)
                                                    ->label(__('Dark Mode Color Inversion'))
                                                    ->helperText(__('Automatically inverts image colors in dark mode for better contrast.')),
                                            ]),

                                        Repeater::make('hero.slider_content')
                                            ->columnSpanFull()
                                            ->cloneable()
                                            ->reorderable()
                                            ->itemLabel(function (array $state): string {
                                                return $state['slider_title'] ?? __('Slide Item');
                                            })
                                            ->collapsible()
                                            ->collapsed()
                                            ->columns(1)
                                            ->label(__('Slider Images'))
                                            ->helperText(__('Add images to be displayed in the slider. Recommended aspect ratio is 16:9.'))
                                            ->schema([
                                                Group::make()
                                                    ->schema([
                                                        TextInput::make('slider_title')
                                                            ->label(__('Slide Title'))
                                                            ->helperText(__('Used for administrative purposes and alt text.'))
                                                            ->placeholder(__('Product Showcase'))
                                                            ->prefixIcon('heroicon-o-document-text')
                                                            ->maxLength(50),

                                                        FileUpload::make('slider_image')
                                                            ->label(__('Slide Image'))
                                                            ->directory('hero/slider')
                                                            ->disk('public')
                                                            ->visibility('public')
                                                            ->image()
                                                            ->imageEditor()
                                                            ->imageEditorAspectRatios([
                                                                '16:9' => '16:9',
                                                                '4:3'  => '4:3',
                                                                '3:2'  => '3:2',
                                                            ])
                                                            ->columnSpanFull()
                                                            ->helperText(__('Upload an image for this slide. Recommended size: 1920×1080px.')),

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
                                                    ]),
                                            ]),
                                    ]),
                            ])->columnSpanFull(),
                    ]),
            ]);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (isset($data['layout']['hero']['slider_content']) && ! is_array($data['layout']['hero']['slider_content'])) {
            $data['layout']['hero']['slider_content'] = [];
        }

        if (isset($data['layout']['hero'])) {
            foreach (['featured_image', 'dark_mode_featured_image', 'bg_image'] as $imageField) {
                if (isset($data['layout']['hero'][$imageField]) && ! is_array($data['layout']['hero'][$imageField]) && ! is_null($data['layout']['hero'][$imageField])) {
                    $data['layout']['hero'][$imageField] = [$data['layout']['hero'][$imageField]];
                }
            }

            if (isset($data['layout']['hero']['slider_content']) && is_array($data['layout']['hero']['slider_content'])) {
                foreach ($data['layout']['hero']['slider_content'] as $key => $item) {
                    if (isset($item['slider_image']) && ! is_array($item['slider_image']) && ! is_null($item['slider_image'])) {
                        $data['layout']['hero']['slider_content'][$key]['slider_image'] = [$item['slider_image']];
                    }
                }
            }
        }

        return $data;
    }
}

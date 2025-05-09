<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditAppearance extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';

    public static function getNavigationLabel(): string
    {
        return __('Design & Appearance');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Design & Appearance Settings');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Configure your background, favicon and website logo.');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Design Settings')
                    ->columnSpanFull()
                    ->persistTab()
                    ->persistTabInQueryString('id')
                    ->tabs([
                        Tabs\Tab::make(__('Logo & Icons'))
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make(__(null))
                                    ->icon('heroicon-o-photo')
                                    ->description(__('Logo - Change the logo of your website'))
                                    ->columns(3)
                                    ->schema([
                                        CuratorPicker::make('design.logo')
                                            ->label(__('Logo'))
                                            ->helperText(__('Upload a logo for your website'))
                                            ->directory('public/logo'),
                                        CuratorPicker::make('design.logo_dark_mode')
                                            ->label(__('Dark Mode Logo'))
                                            ->helperText(__('Upload a logo for dark mode.'))
                                            ->directory('public/logo/dark-mode'),
                                        Select::make('design.logo_size')
                                            ->label(__('Logo Size'))
                                            ->prefixIcon('heroicon-o-window')
                                            ->options([
                                                'max-w-11' => __('Small'),
                                                'max-w-14' => __('Default'),
                                                'max-w-24' => __('Medium'),
                                                'max-w-32' => __('Large'),
                                                'max-w-48' => __('Extra Large'),
                                            ])
                                            ->default('max-w-14')
                                            ->helperText(__('Define the size of the logo on your website.')),
                                    ]),
                                Section::make(__(null))
                                    ->description(__('Favicon - Change the favicon of your website.'))
                                    ->icon('heroicon-o-star')
                                    ->columns(3)
                                    ->schema([
                                        FileUpload::make('design.favicon')
                                            ->image()
                                            ->imageEditor()
                                            ->imageEditorAspectRatios([
                                                '16:9',
                                                '4:3',
                                                '1:1',
                                            ])
                                            ->directory('public/favicon')
                                            ->helperText(__('.ico or .png would be amazing!'))
                                            ->label(__('Favicon')),
                                    ]),
                            ]),

                        Tabs\Tab::make(__('Layout & Design'))
                            ->icon('heroicon-o-rectangle-group')
                            ->schema([
                                Section::make(__(null))
                                    ->icon('heroicon-o-paint-brush')
                                    ->description(__('Change the design and appearance of your website'))
                                    ->columns(4)
                                    ->schema([
                                        Checkbox::make('design.darkmode_is_active')
                                            ->label(__('Switch Component'))
                                            ->helperText(__('Enable dark/light mode switch'))
                                            ->inline(true)
                                            ->default(true),
                                        Checkbox::make('design.line_beam_is_active')
                                            ->label(__('Line Beam'))
                                            ->helperText(__('Enable line beam on top of header'))
                                            ->inline(true)
                                            ->default(false),
                                        Checkbox::make('design.is_menu_highlighted')
                                            ->label(__('Highlight Menu'))
                                            ->inline(true)
                                            ->helperText(__('Activate the highlight of the menu item on your website.')),
                                        Select::make('design.container_width')
                                            ->required()
                                            ->label(__('Container Width'))
                                            ->options([
                                                'max-w-3xl'  => __('3xl (512px'),
                                                'max-w-4xl'  => __('4xl (640px)'),
                                                'max-w-5xl'  => __('5xl (768px)'),
                                                'max-w-6xl'  => __('6xl (1024px)'),
                                                'max-w-7xl'  => __('7xl (1280px)'),
                                                'full-width' => __('Full Width'),
                                            ])
                                            ->default('max-w-7xl')
                                            ->helperText(__('Define the width of the container on your website. Default: 1280px')),
                                    ]),
                            ]),

                        Tabs\Tab::make(__('Background'))
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Section::make(__(null))
                                    ->icon('heroicon-o-photo')
                                    ->description(__('Change the background image of your website'))
                                    ->schema([
                                        Checkbox::make('design.background_image_visibility')
                                            ->label(__('Visible'))
                                            ->default(true)
                                            ->helperText(__('Activate the background image on your website.')),
                                        Group::make()
                                            ->columns(2)
                                            ->columnSpanFull()
                                            ->schema([
                                                FileUpload::make('design.background_image')
                                                    ->image()
                                                    ->imageEditor()
                                                    ->imageEditorAspectRatios([
                                                        '16:9',
                                                        '4:3',
                                                        '1:1',
                                                    ])
                                                    ->directory('public/background')
                                                    ->label(__('Background Image'))
                                                    ->helperText('Set the background of your website.
                                            Recommended size: 1920x1080px (16:9)'),
                                                FileUpload::make('design.dark_mode_background_image')
                                                    ->image()
                                                    ->imageEditor()
                                                    ->imageEditorAspectRatios([
                                                        '16:9',
                                                        '4:3',
                                                        '1:1',
                                                    ])
                                                    ->directory('public/background')
                                                    ->label(__('Dark Mode Background Image'))
                                                    ->helperText(__('Set the background of your website in dark mode.')),
                                            ]),
                                        Group::make()
                                            ->columnSpanFull()
                                            ->columns(4)
                                            ->schema([
                                                Checkbox::make('design.animation')
                                                    ->label(__('Opacity Animation FX'))
                                                    ->default(false)
                                                    ->helperText(__('Activate the background animation')),
                                                Checkbox::make('design.bg_grayscale')
                                                    ->label(__('Grayscale'))
                                                    ->default(false)
                                                    ->helperText(__('Activate the grayscale effect on the background image.')),
                                                Checkbox::make('design.bg_fixed')
                                                    ->label(__('Fixed'))
                                                    ->default(false)
                                                    ->helperText(__('Image Attachment.')),
                                            ]),
                                        Group::make()
                                            ->columns(4)
                                            ->columnSpanFull()
                                            ->schema([
                                                Select::make('design.bg_blur')
                                                    ->label(__('Blur'))
                                                    ->options([
                                                        'blur-none' => __('None'),
                                                        'blur-sm'   => __('Small'),
                                                        'blur-xl'   => __('Default'),
                                                        'blur-3xl'  => __('Large'),
                                                    ])
                                                    ->default('blur-none')
                                                    ->helperText(__('Activate the blur effect on the background image.')),
                                                Select::make('design.background_image_position')
                                                    ->label(__('Position'))
                                                    ->options([
                                                        'bg-top'    => __('Top'),
                                                        'bg-center' => __('Center'),
                                                        'bg-bottom' => __('Bottom'),
                                                    ])
                                                    ->default('bg-center')
                                                    ->helperText(__('Position of the background image on your website.')),
                                                Select::make('design.background_image_size')
                                                    ->label(__('Size'))
                                                    ->options([
                                                        'bg-auto'    => __('Auto'),
                                                        'bg-cover'   => __('Cover'),
                                                        'bg-contain' => __('Contain'),
                                                    ])
                                                    ->default('bg-cover')
                                                    ->helperText(__('Size of the background image on your website.')),
                                                Select::make('design.background_image_repeat')
                                                    ->label(__('Repeat'))
                                                    ->options([
                                                        'bg-no-repeat' => __('No Repeat'),
                                                        'bg-repeat'    => __('Repeat'),
                                                        'bg-repeat-x'  => __('Repeat-X'),
                                                        'bg-repeat-y'  => __('Repeat-Y'),
                                                    ])
                                                    ->default('no-repeat')
                                                    ->helperText(__('Repeat the background image on your website.')),
                                            ]),
                                    ]),
                            ]),
                    ])
                    ->activeTab(1),
            ]);
    }
}

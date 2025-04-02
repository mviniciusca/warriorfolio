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
                Section::make(__('Application Logo'))
                    ->description(__('Change the design and appearance of your application'))
                    ->icon('heroicon-o-sparkles')
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
                Section::make(__('Design Options'))
                    ->description(__('Change the design and appearance of your website'))
                    ->icon('heroicon-o-sparkles')
                    ->columns(3)
                    ->schema([
                        Checkbox::make('design.is_menu_highlighted')
                            ->label(__('Highlight Menu'))
                            ->inline(false)
                            ->helperText(__('Activate the highlight of the menu item on your website.')),
                    ]),
                Section::make(__('Core: Background Image'))
                    ->description(__('Change the background image of your website'))
                    ->icon('heroicon-o-photo')
                    ->schema([
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
                                    ->directory('public/background/dark-mode')
                                    ->label(__('Dark Mode Background Image'))
                                    ->helperText(__('Set the background of your website in dark mode.')),
                            ]),
                        Group::make()
                            ->columnSpanFull()
                            ->columns(4)
                            ->schema([
                                Checkbox::make('design.background_image_visibility')
                                    ->label(__('Visible'))
                                    ->helperText(__('Activate the background image on your website.')),
                                Checkbox::make('design.animation')
                                    ->label(__('Opacity Animation FX'))
                                    ->default(true)
                                    ->helperText(__('Activate the background animation')),
                                Checkbox::make('design.bg_grayscale')
                                    ->label(__('Grayscale'))
                                    ->default(true)
                                    ->helperText(__('Activate the grayscale effect on the background image.')),
                                Checkbox::make('design.bg_blur')
                                    ->label(__('Blur'))
                                    ->default(true)
                                    ->helperText(__('Activate the blur effect on the background image.')),
                            ]),
                        Group::make()
                            ->columns(3)
                            ->columnSpanFull()
                            ->schema([
                                Radio::make('design.background_image_position')
                                    ->label(__('Background Image Position'))

                                    ->options([
                                        'bg-top'    => __('Top'),
                                        'bg-center' => __('Center'),
                                        'bg-bottom' => __('Bottom'),
                                    ])
                                    ->default('bg-center')
                                    ->helperText(__('Choose the position of the background image on your application.')),
                                Radio::make('design.background_image_size')
                                    ->label(__('Background Image Size'))

                                    ->options([
                                        'bg-auto'    => __('Auto'),
                                        'bg-cover'   => __('Cover'),
                                        'bg-contain' => __('Contain'),
                                    ])
                                    ->default('bg-cover')
                                    ->helperText(__('Choose the size of the background image on your application.')),
                                Radio::make('design.background_image_repeat')
                                    ->label(__('Background Image Repeat'))

                                    ->options([
                                        'bg-no-repeat' => __('No Repeat'),
                                        'bg-repeat'    => __('Repeat'),
                                        'bg-repeat-x'  => __('Repeat-X'),
                                        'bg-repeat-y'  => __('Repeat-Y'),
                                    ])
                                    ->default('no-repeat')
                                    ->helperText(__('Choose the repeat of the background image on your application.')),
                            ]),
                    ]),
                Section::make(__('Favicon'))
                    ->description(__('Change the favicon of your website.'))
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
            ]);
    }
}

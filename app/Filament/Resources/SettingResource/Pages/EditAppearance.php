<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditAppearance extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';

    public static function getNavigationLabel(): string
    {
        return __('Design & Appearance');
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
                Section::make(__('Background'))
                    ->description(__('Change the design and appearance of your website'))
                    ->icon('heroicon-o-photo')
                    ->columns(3)
                    ->schema([
                        Toggle::make('design.background_image_visibility')
                            ->label('Background Image Visibility')
                            ->inline(false)
                            ->helperText('Show or hide the background image on your website.'),
                        FileUpload::make('design.background_image')
                            ->columnSpan(2)
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
                        Group::make()
                            ->columns(3)
                            ->columnSpanFull()
                            ->schema([
                                Select::make('design.background_image_position')
                                    ->label(__('Background Image Position'))
                                    ->prefixIcon('heroicon-o-window')
                                    ->options([
                                        'bg-top'    => __('Top'),
                                        'bg-center' => __('Center'),
                                        'bg-bottom' => __('Bottom'),
                                    ])
                                    ->default('center')
                                    ->helperText(__('Choose the position of the background image on your application.')),
                                Select::make('design.background_image_size')
                                    ->label(__('Background Image Size'))
                                    ->prefixIcon('heroicon-o-window')
                                    ->options([
                                        'bg-auto'    => __('Auto'),
                                        'bg-cover'   => __('Cover'),
                                        'bg-contain' => __('Contain'),
                                    ])
                                    ->default('cover')
                                    ->helperText(__('Choose the size of the background image on your application.')),
                                Select::make('design.background_image_repeat')
                                    ->label(__('Background Image Repeat'))
                                    ->prefixIcon('heroicon-o-window')
                                    ->options([
                                        'bg-no-repeat' => __('No Repeat'),
                                        'bg-repeat'    => __('Repeat'),
                                        'bg-repeat-x'  => __('Repeat X'),
                                        'bg-repeat-y'  => __('Repeat Y'),
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

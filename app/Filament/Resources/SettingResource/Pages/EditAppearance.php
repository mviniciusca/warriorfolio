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
                        CuratorPicker::make('logo')
                            ->label(__('Logo'))
                            ->helperText(__('Upload a logo for your website'))
                            ->directory('public/logo'),
                        CuratorPicker::make('logo_dark_mode')
                            ->label(__('Dark Mode Logo'))
                            ->helperText(__('Upload a logo for dark mode.'))
                            ->directory('public/logo/dark-mode'),
                        Select::make('logo_size')
                            ->label(__('Logo Size'))
                            ->options([
                                'max-w-11' => 'Small',
                                'max-w-14' => 'Default',
                                'max-w-24' => 'Medium',
                                'max-w-32' => 'Large',
                                'max-w-48' => 'Extra Large',
                            ])
                            ->default('max-w-14')
                            ->helperText(__('Define the size of the logo on your website.')),
                    ]),
                Section::make(__('Background'))
                    ->description(__('Change the design and appearance of your website'))
                    ->icon('heroicon-o-photo')
                    ->columns(3)
                    ->schema([
                        Toggle::make('background_image_visibility')
                            ->label('Background Image Visibility')
                            ->inline(false)
                            ->helperText('Show or hide the background image on your website.'),
                        FileUpload::make('background_image')
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
                                Select::make('background_image_position')
                                    ->label(__('Background Image Position'))
                                    ->options([
                                        'bg-top'    => 'Top',
                                        'bg-center' => 'Center',
                                        'bg-bottom' => 'Bottom',
                                    ])
                                    ->default('center')
                                    ->helperText(__('Choose the position of the background image on your application.')),
                                Select::make('background_image_size')
                                    ->label(__('Background Image Size'))
                                    ->options([
                                        'bg-auto'    => 'Auto',
                                        'bg-cover'   => 'Cover',
                                        'bg-contain' => 'Contain',
                                    ])
                                    ->default('cover')
                                    ->helperText(__('Choose the size of the background image on your application.')),
                                Select::make('background_image_repeat')
                                    ->label(__('Background Image Repeat'))
                                    ->options([
                                        'bg-no-repeat' => 'No Repeat',
                                        'bg-repeat'    => 'Repeat',
                                        'bg-repeat-x'  => 'Repeat X',
                                        'bg-repeat-y'  => 'Repeat Y',
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
                        FileUpload::make('favicon')
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

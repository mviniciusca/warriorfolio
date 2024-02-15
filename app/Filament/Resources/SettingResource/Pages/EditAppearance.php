<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\SettingResource;
use Awcodes\Curator\Components\Forms\CuratorPicker;

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
                Section::make('Design & Appearance')
                    ->description('Change the design and appearance of your application')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Toggle::make('background_image_visibility')
                            ->label('Background Image Visibility')
                            ->inline(false)
                            ->helperText('Show or hide the background image on your application. This option prevent to show the default background image on your application.'),
                        FileUpload::make('background_image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('public/background')
                            ->label('Background Image')
                            ->helperText('This image will be used as the background of your application. Recommended size: 1920x1080px (16:9)'),
                        FileUpload::make('favicon')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('public/favicon')
                            ->helperText('.ico or .png would be amazing!')
                            ->label('Favicon'),
                        Group::make()->schema([
                            Select::make('background_image_position')
                                ->label('Background Image Position')
                                ->options([
                                    'bg-top' => 'Top',
                                    'bg-center' => 'Center',
                                    'bg-bottom' => 'Bottom',
                                ])
                                ->default('center')
                                ->helperText('Choose the position of the background image on your application.'),
                            Select::make('background_image_size')
                                ->label('Background Image Size')
                                ->options([
                                    'bg-auto' => 'Auto',
                                    'bg-cover' => 'Cover',
                                    'bg-contain' => 'Contain',
                                ])
                                ->default('cover')
                                ->helperText('Choose the size of the background image on your application.'),
                            Select::make('background_image_repeat')
                                ->label('Background Image Repeat')
                                ->options([
                                    'bg-no-repeat' => 'No Repeat',
                                    'bg-repeat' => 'Repeat',
                                    'bg-repeat-x' => 'Repeat X',
                                    'bg-repeat-y' => 'Repeat Y',
                                ])
                                ->default('no-repeat')
                                ->helperText('Choose the repeat of the background image on your application.'),
                        ])
                            ->columns(3)
                            ->columnSpanFull(),
                        CuratorPicker::make('logo')
                            ->label('Logo')
                            ->helperText('Upload a logo for your application. If you don\'t upload a logo, the default logo will be used.')
                            ->directory('public/logo'),
                        CuratorPicker::make('logo_dark_mode')
                            ->label('Dark Mode Logo')
                            ->helperText('Upload a logo for dark mode. If you don\'t upload a logo, the default logo will be used.')
                            ->directory('public/logo/dark-mode'),
                        Select::make('logo_size')
                            ->label('Logo Size')
                            ->options([
                                'max-w-11' => 'Small',
                                'max-w-14' => 'Default',
                                'max-w-24' => 'Medium',
                                'max-w-32' => 'Large',
                                'max-w-48' => 'Extra Large',
                            ])
                            ->default('max-w-14')
                            ->helperText('Choose the size of the logo on your application.'),
                    ])
                    ->columns(3),
            ]);
    }

}

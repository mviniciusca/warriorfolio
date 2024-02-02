<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\SettingResource;

class EditHeroSection extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    public static function getNavigationLabel(): string
    {
        return __('Hero Section');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    Group::make([
                        Toggle::make('hero')
                            ->label('Show Hero Section')
                            ->helperText('Show or hide the hero section on the website.'),
                    ])->relationship('module'),
                ]),
            Section::make('Hero Section')
                ->description('This section is used to display your hero section to the public.')
                ->icon('heroicon-o-photo')
                ->schema([
                    Group::make()->relationship('layout')->schema([
                        Textarea::make('hero_section_title')
                            ->autoFocus()
                            ->label('Hero Section Title')
                            ->columnSpanFull()
                            ->helperText('HTML allowed. Use the class text-highlight to highlight a word in the title. Max: 140 characters.')
                            ->rows(3)
                            ->maxLength(140),
                        Textarea::make('hero_section_subtitle_text')
                            ->label('Hero Section Subtitle')
                            ->columnSpanFull()
                            ->helperText('You also can use the class text-highlight to highlight a word in the subtitle. Max: 160 characters.')
                            ->rows(3)
                            ->maxLength(160),
                        TextInput::make('hero_section_button_text')
                            ->label('Hero Section Button Text')
                            ->helperText('Max: 50 characters.')
                            ->maxLength(50),
                        TextInput::make('hero_section_button_url')
                            ->label('Hero Section Button URL')
                            ->helperText('Use the full URL. Max: 255 characters.')
                            ->maxLength(255),
                        TextInput::make('hero_alt_button_text')
                            ->label('Hero Section Alt Button Text')
                            ->helperText('Max: 50 characters.')
                            ->maxLength(50),
                        TextInput::make('hero_alt_button_url')
                            ->label('Hero Section Alt Button URL')
                            ->url()
                            ->helperText('Use the full URL. Max: 255 characters.')
                            ->maxLength(255),
                        Select::make('hero_button_link_target')
                            ->options([
                                '_self' => 'Same Window',
                                '_blank' => 'New Window',
                            ])
                            ->label('Hero Section Button Link Target')
                            ->helperText('Choose the target for the button link.'),
                        Select::make('hero_alt_button_link_target')
                            ->options([
                                '_self' => 'Same Window',
                                '_blank' => 'New Window',
                            ])
                            ->label('Hero Section Alt Button Link Target')
                            ->helperText('Choose the target for the alt button link.'),
                        FileUpload::make('hero_section_image')
                            ->label('Hero Section Featured Image')
                            ->directory('hero')
                            ->image()
                            ->columnSpanFull()
                            ->imageEditor()
                            ->helperText('This is your featured image for the hero section.'),
                        Group::make()->columns(2)->schema([
                            Toggle::make('hero_is_bg_visible')
                                ->label('Show Background Image')
                                ->helperText('Show or hide the background image.'),
                            FileUpload::make('hero_section_bg_image')
                                ->label('Hero Section Background Image')
                                ->directory('hero/bg')
                                ->image()
                                ->imageEditor()
                                ->helperText('Upload a background image for the hero section.'),
                            Group::make()->columns(3)->schema([
                                Select::make('hero_section_bg_position')
                                    ->options([
                                        'bg-center' => 'Center',
                                        'bg-top' => 'Top',
                                        'bg-bottom' => 'Bottom',
                                        'bg-left' => 'Left',
                                        'bg-right' => 'Right',
                                    ])
                                    ->label('Background Image Position')
                                    ->helperText('Choose the position of the background image.'),
                                Select::make('hero_section_bg_size')
                                    ->options([
                                        'bg-auto' => 'Auto',
                                        'bg-cover' => 'Cover',
                                        'bg-contain' => 'Contain',
                                    ])
                                    ->label('Background Image Size')
                                    ->helperText('Choose the size of the background image.'),
                                Select::make('hero_section_bg_repeat')
                                    ->options([
                                        'bg-repeat' => 'Repeat',
                                        'bg-no-repeat' => 'No Repeat',
                                        'bg-repeat-x' => 'Repeat X',
                                        'bg-repeat-y' => 'Repeat Y',
                                    ])
                                    ->label('Background Image Repeat')
                                    ->helperText('Choose the repeat of the background image.'),
                            ])->columnSpanFull()
                        ])->columnSpanFull(),
                    ])->columns(2),
                ]),
        ]);
    }
}

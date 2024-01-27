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
                            ->url()
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
                            ->label('Hero Section Image')
                            ->directory('hero')
                            ->image()
                            ->imageEditor()
                            ->columnSpanFull()
                            ->helperText('This is your featured image for the hero section.'),
                    ])->columns(2),
                ]),
        ]);
    }
}

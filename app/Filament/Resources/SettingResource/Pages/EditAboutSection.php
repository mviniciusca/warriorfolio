<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SettingResource;

class EditAboutSection extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static function getNavigationLabel(): string
    {
        return __('About Section');
    }
    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    Group::make([
                        Toggle::make('about')
                            ->label('Show About Section')
                            ->helperText('Show or hide the about section on the website.'),
                    ])
                        ->relationship('module'),
                ]),
            Section::make('About Section')
                ->relationship('layout')
                ->description('This module is used to display your certifications, skills and your profile
                            to the public.')
                ->icon('heroicon-o-user')
                ->schema([
                    Toggle::make('about_section_fill')
                        ->label('Fill Section Background')
                        ->helperText('Fill the background of this section with a secondary default color.'),
                    Textarea::make('about_section_title')
                        ->label('About Section Title')
                        ->helperText('HTML allowed. Use the class text-highlight to highlight a word in the title')
                        ->rows(3)
                        ->columnSpanFull()
                        ->maxLength(255),
                    Textarea::make('about_section_subtitle_text')
                        ->label('About Section Subtitle')
                        ->helperText('you also can use the class text-highlight to highlight a word in the subtitle')
                        ->rows(3)
                        ->columnSpanFull()
                        ->maxLength(255),
                ])->columns(2),
        ]);
    }
}

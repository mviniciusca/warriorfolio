<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class EditSection extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $title = 'App Sections';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->relationship('layout')
                    ->schema([
                        Section::make('Hero Section')
                            ->description('This section is used to display your hero image and your hero text to the public.')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Textarea::make('hero_section_title')
                                    ->autofocus()
                                    ->label('Hero Section Title')
                                    ->helperText("HTML allowed. Use the class text-highlight to highlight a word in the title")
                                    ->maxLength(255),
                                Textarea::make('hero_section_subtitle_text')
                                    ->label('Hero Section Subtitle')
                                    ->helperText('you also can use the class text-highlight to highlight a word in the subtitle')
                                    ->maxLength(255),
                            ])->columns(2)->collapsed(),
                        Section::make('Portfolio Section')
                            ->description('This section is used to display your portfolio to the public.')
                            ->icon('heroicon-o-bolt')
                            ->schema([
                                Textarea::make('portfolio_section_title')
                                    ->label('Portfolio Section Title')
                                    ->helperText('HTMl allowed. Use the class text-highlight to highlight a word in the title')
                                    ->maxLength(255),
                                Textarea::make('portfolio_section_subtitle_text')
                                    ->label('Portfolio Section Subtitle')
                                    ->helperText('you also can use the class text-highlight to highlight a word in the subtitle')
                                    ->maxLength(255),
                            ])->columns(2)->collapsed(),
                        Section::make('About Section')
                            ->description('This module is used to display your certifications, skills and your profile
                            to the public.')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Textarea::make('about_section_title')
                                    ->label('About Section Title')
                                    ->helperText('HTML allowed. Use the class text-highlight to highlight a word in the title')
                                    ->maxLength(255),
                                Textarea::make('about_section_subtitle_text')
                                    ->label('About Section Subtitle')
                                    ->helperText('you also can use the class text-highlight to highlight a word in the subtitle')
                                    ->maxLength(255),
                            ])->columns(2)->collapsed(),
                        Section::make('Clients Section')
                            ->description('This section is used to display your clients to the public.')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Textarea::make('clients_section_title')
                                    ->label('Clients Section Text')
                                    ->helperText('HTML allowed. Use the class text-highlight to highlight a word in the text')
                                    ->maxLength(255),
                                Textarea::make('clients_section_subtitle_text')
                                    ->label('Clients Section Subtitle')
                                    ->helperText('you also can use the class text-highlight to highlight a word in the subtitle')
                                    ->maxLength(255),
                            ])->columns(2)->collapsed(),
                        Section::make('Newsletter Section')
                            ->description('You can managing your newsletter section here.')
                            ->icon('heroicon-o-envelope-open')
                            ->schema([
                                Textarea::make('newsletter_section_title')
                                    ->label('Newsletter Section Text')
                                    ->helperText('HTML allowed. Use the class text-highlight to highlight a word in the text')
                                    ->maxLength(255),
                                Textarea::make('newsletter_section_subtitle_text')
                                    ->label('Newsletter Section Subtitle')
                                    ->helperText('you also can use the class text-highlight to highlight a word in the subtitle')
                                    ->maxLength(255),
                                Textarea::make('newsletter_section_button_text')
                                    ->label('Newsletter Button Text')
                                    ->helperText('you also can use the class text-highlight to highlight a word in the subtitle')
                                    ->maxLength(255),
                                FileUpload::make('newsletter_section_image')
                                    ->label('Newsletter Section Image')
                                    ->image()
                                    ->imageEditor(),
                            ])->columns(2)->collapsed(),
                    ])->columnSpanFull(),
            ]);
    }

}

<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditAboutSection extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getNavigationLabel(): string
    {
        return __('About Section');
    }

    public function getTitle(): string | Htmlable
    {
        return __('About You Section Settings');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Manager your About You section in your website.');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        Group::make()
                            ->relationship('module')
                            ->schema([
                                Toggle::make('about')
                                    ->label(__('Show About Section'))
                                    ->default(false)
                                    ->helperText(__('Show or hide the about section on the website.')),
                            ]),
                    ]),
                Section::make(__('About Section'))
                    ->relationship('layout')
                    ->description(__('This module is used to display your certifications, skills and your profile to the public.'))
                    ->icon('heroicon-o-user')
                    ->columns(2)
                    ->schema([
                        Toggle::make('about.section_fill')
                            ->label(__('Fill Section Background'))
                            ->helperText(__('Fill the background of this section with a secondary default color.')),
                        TextInput::make('about.section_title')
                            ->placeholder(__('hackable ♠'))
                            ->label(__('About Section Title'))
                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                            ->helperText(__('HTML allowed. Use the class text-highlight to highlight a word in the title'))
                            ->columnSpanFull()
                            ->maxLength(255),
                        TextInput::make('about.section_subtitle')
                            ->placeholder(__('hackable ♠'))
                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                            ->label(__('About Section Subtitle'))
                            ->helperText(__('You also can use the class text-highlight to highlight a word in the subtitle'))
                            ->columnSpanFull()
                            ->maxLength(255),
                    ]),
            ]);
    }
}

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

class EditClientSection extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    public static function getNavigationLabel(): string
    {
        return __('Clients Section');
    }
    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    Group::make([
                        Toggle::make('clients')
                            ->label('Show Clients Section')
                            ->helperText('Show or hide the clients section on the website.'),
                    ])->relationship('module'),
                ]),
            Section::make('Clients Section')
                ->relationship('layout')
                ->description('This section is used to display your clients to the public.')
                ->icon('heroicon-o-building-office')
                ->schema([
                    Toggle::make('clients_section_fill')
                        ->label('Fill Section Background')
                        ->helperText('Fill the background of this section with a secondary default color.'),
                    Textarea::make('clients_section_title')
                        ->label('Clients Section Text')
                        ->helperText('HTML allowed. Use the class text-highlight to highlight a word in the text')
                        ->columnSpanFull()
                        ->rows(3)
                        ->maxLength(255),
                    Textarea::make('clients_section_subtitle_text')
                        ->label('Clients Section Subtitle')
                        ->helperText('you also can use the class text-highlight to highlight a word in the subtitle')
                        ->columnSpanFull()
                        ->rows(3)
                        ->maxLength(255),
                ])->columns(2),
        ]);
    }
}

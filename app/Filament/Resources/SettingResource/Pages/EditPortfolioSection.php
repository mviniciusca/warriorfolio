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

class EditPortfolioSection extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    public static function getNavigationLabel(): string
    {
        return __('Portfolio Section');
    }
    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    Group::make([
                        Toggle::make('portfolio')
                            ->label('Show Portfolio Section')
                            ->helperText('Show or hide the portfolio section on the website.'),
                    ])->relationship('module'),
                ]),
            Section::make('Portfolio Section')
                ->relationship('layout')
                ->description('This section is used to display your portfolio to the public.')
                ->icon('heroicon-o-rocket-launch')
                ->schema([
                    Toggle::make('portfolio_section_fill')
                        ->label('Fill Section Background')
                        ->helperText('Fill the background of this section with a secondary default color.'),
                    Textarea::make('portfolio_section_title')
                        ->label('Portfolio Section Title')
                        ->helperText('HTMl allowed. Use the class text-highlight to highlight a word in the title')
                        ->rows(3)
                        ->columnSpanFull()
                        ->maxLength(255),
                    Textarea::make('portfolio_section_subtitle_text')
                        ->label('Portfolio Section Subtitle')
                        ->helperText('you also can use the class text-highlight to highlight a word in the subtitle')
                        ->rows(3)
                        ->columnSpanFull()
                        ->maxLength(255),
                ])->columns(2),
        ]);
    }
}

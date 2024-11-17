<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditPortfolioSection extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    public static function getNavigationLabel(): string
    {
        return __('Portfolio Section');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Portfolio Section Settings');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Manager your Portfolio section in your website.');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->relationship('module')
                    ->schema([
                        Group::make([
                            Toggle::make('portfolio')
                                ->label(__('Show Portfolio Section'))
                                ->helperText(__('Show or hide the portfolio section on the website.')),
                        ]),
                    ]),
                Section::make(__('Portfolio Section'))
                    ->relationship('layout')
                    ->description(__('This section is used to display your portfolio to the public.'))
                    ->icon('heroicon-o-rocket-launch')
                    ->columns(2)
                    ->schema([
                        Toggle::make('portfolio.section_fill')
                            ->default(false)
                            ->label('Fill Section Background')
                            ->helperText('Fill the background of this section with a secondary default color.'),
                        Textarea::make('portfolio.section_title')
                            ->label('Portfolio Section Title')
                            ->helperText(__('HTMl allowed. Use the class tl to highlight a word in the title'))
                            ->rows(3)
                            ->columnSpanFull()
                            ->maxLength(255),
                        Textarea::make('portfolio.section_subtitle')
                            ->label(__('Portfolio Section Subtitle'))
                            ->helperText(__('HTMl allowed. Use the class tl to highlight a word in the title'))
                            ->rows(3)
                            ->columnSpanFull()
                            ->maxLength(255),
                    ]),
            ]);
    }
}

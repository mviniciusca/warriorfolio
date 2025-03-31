<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditClientSection extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function getNavigationLabel(): string
    {
        return __('Customers Section');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Customers Section');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Define your Customers section here.');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    Group::make()
                        ->relationship('module')
                        ->schema([
                            Toggle::make('clients')
                                ->label(__('Show Customers Section'))
                                ->helperText(__('Show or hide the Customers section on the website.')),
                        ]),
                ]),
            Section::make(__('Customers Section'))
                ->relationship('layout')
                ->description(__('This section is used to display your Customers to the public.'))
                ->icon('heroicon-o-building-office')
                ->columns(3)
                ->schema([
                    Checkbox::make('customer.is_heading_visible')
                        ->label(__('Show Section Heading'))
                        ->default(true)
                        ->helperText(__('Show or hide the section title and subtitle.')),
                    Checkbox::make('customer.section_fill')
                        ->label(__('Fill Section Background'))
                        ->helperText(__('Fill the background of this section with a secondary default color.')),
                    Checkbox::make('customer.is_section_filled_inverted')
                        ->label(__('Fill Section Background Inverse'))
                        ->helperText(__('Fill background with light color in dark mode and dark color in light mode.')),
                    TextInput::make('customer.section_title')
                        ->label(__('Customers Section Text'))
                        ->helperText(__('HTML allowed. Use the class text-highlight to highlight a word in the text'))
                        ->placeholder(__('hackable ♠'))
                        ->columnSpanFull()
                        ->prefixIcon('heroicon-o-bars-3-bottom-left')
                        ->maxLength(255),
                    TextInput::make('customer.section_subtitle')
                        ->label(__('Customers Section Subtitle'))
                        ->helperText(__('You also can use the class text-highlight to highlight a word in the subtitle'))
                        ->placeholder(__('hackable ♠'))
                        ->columnSpanFull()
                        ->prefixIcon('heroicon-o-bars-3-bottom-left')
                        ->maxLength(255),
                ]),
        ]);
    }
}

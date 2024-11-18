<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
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
                ->columns(2)
                ->schema([
                    Toggle::make('customer.section_fill')
                        ->label(__('Fill Section Background'))
                        ->helperText(__('Fill the background of this section with a secondary default color.')),
                    Textarea::make('customer.section_title')
                        ->label(__('Customers Section Text'))
                        ->helperText(__('HTML allowed. Use the class text-highlight to highlight a word in the text'))
                        ->columnSpanFull()
                        ->rows(3)
                        ->maxLength(255),
                    Textarea::make('customer.section_subtitle')
                        ->label(__('Customers Section Subtitle'))
                        ->helperText(__('You also can use the class text-highlight to highlight a word in the subtitle'))
                        ->columnSpanFull()
                        ->rows(3)
                        ->maxLength(255),
                ]),
        ]);
    }
}

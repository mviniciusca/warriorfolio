<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditFooterSection extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    public static function getNavigationLabel(): string
    {
        return __('Footer Section');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Footer Section');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Define your Footer section here.');
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
                            Toggle::make('footer')
                                ->label(__('Show Footer Section'))
                                ->helperText(__('Show or hide the footer section on the website.')),
                        ]),
                ]),
            Section::make()
                ->description(__('Define the design and layout of the footer section on the website.'))
                ->icon('heroicon-o-bolt')
                ->relationship('layout')
                ->schema([
                    Toggle::make('footer_section_fill')
                        ->label(__('Fill Section Background'))
                        ->helperText(__('Fill the background of this section with a secondary default color.')),
                ]),
        ]);
    }
}

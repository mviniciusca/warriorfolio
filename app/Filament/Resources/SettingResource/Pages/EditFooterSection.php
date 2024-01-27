<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SettingResource;

class EditFooterSection extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    public static function getNavigationLabel(): string
    {
        return __('Footer Section');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    Group::make([
                        Toggle::make('footer')
                            ->label('Show Footer Section')
                            ->helperText('Show or hide the footer section on the website.'),
                    ])->relationship('module'),
                ]),
            Section::make()
                ->description('Define the design and layout of the footer section on the website.')
                ->icon('heroicon-o-bolt')
                ->relationship('layout')
                ->schema([
                    Toggle::make('footer_section_fill')
                        ->label('Fill Section Background')
                        ->helperText('Fill the background of this section with a secondary default color.'),
                ]),
        ]);
    }
}

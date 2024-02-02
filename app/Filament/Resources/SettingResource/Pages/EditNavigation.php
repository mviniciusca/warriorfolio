<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SettingResource;

class EditNavigation extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-bars-3-bottom-left';

    public static function getNavigationLabel(): string
    {
        return __('Navigation');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Header Navigation')->icon('heroicon-o-bars-3-bottom-left')->description('Define the navigation of your application')->schema([
                    Group::make()
                        ->relationship('navigation')
                        ->schema([
                            Repeater::make('content')
                                ->label('Navigation Links')
                                ->defaultItems(1)
                                ->addActionLabel('Add Link')
                                ->cloneable()
                                ->reorderable()
                                ->schema([
                                    TextInput::make('name')
                                        ->label('Link Title')
                                        ->columnSpan(2)
                                        ->required(),
                                    TextInput::make('url')
                                        ->label('Link URL')
                                        ->columnSpan(2)
                                        ->required(),
                                    Select::make('target')
                                        ->columnSpan(2)
                                        ->label('Link Target')
                                        ->options([
                                            '_self' => 'Same Window',
                                            '_blank' => 'New Window',
                                        ])
                                        ->default('_self')
                                        ->required(),
                                    Toggle::make('is_active')
                                        ->label('Visible')
                                        ->inline(false)
                                        ->default(true)
                                        ->required(),
                                ])->columns(7)
                        ]),
                ])->columnSpanFull()->collapsible(),
            ]);
    }
}

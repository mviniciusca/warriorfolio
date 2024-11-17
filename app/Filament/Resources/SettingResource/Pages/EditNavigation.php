<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

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
                Section::make('Navigation')
                    ->icon('heroicon-o-bars-3-bottom-left')
                    ->description(__('Define the navigation menu of your website.'))
                    ->collapsible()
                    ->schema([
                        Group::make()
                            ->relationship('navigation')
                            ->schema([
                                Repeater::make('content')
                                    ->label(__('Navigation Links'))
                                    ->defaultItems(1)
                                    ->addActionLabel(__('Add Link'))
                                    ->cloneable()
                                    ->reorderable()
                                    ->columns(7)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label(__('Title'))
                                            ->prefixIcon('heroicon-o-window')
                                            ->columnSpan(2)
                                            ->required(),
                                        TextInput::make('url')
                                            ->label(__('URL'))
                                            ->prefixIcon('heroicon-o-link')
                                            ->columnSpan(3)
                                            ->required(),
                                        Select::make('target')
                                            ->columnSpan(1)
                                            ->label(__('Target'))
                                            ->options([
                                                '_self'  => __('Self'),
                                                '_blank' => __('New'),
                                            ])
                                            ->default('_self')
                                            ->required(),
                                        Toggle::make('is_active')
                                            ->label(__('Visible'))
                                            ->inline(false)
                                            ->default(true)
                                            ->required(),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}

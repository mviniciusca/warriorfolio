<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditNavigation extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3-bottom-left';

    public static function getNavigationLabel(): string
    {
        return __('Navigation');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Navigation Menu Settings');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Items for menu navigation of your website.');
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
                                    ->collapsible()
                                    ->label(__('Navigation Links'))
                                    ->defaultItems(1)
                                    ->addActionLabel(__('Add Link'))
                                    ->cloneable()
                                    ->itemLabel(function (array $state): string {
                                        $title = $state['name'] ?? __('Navigation Card');

                                        return preg_replace('/<.*?>.*?<\/.*?>/', '', $title);
                                    })
                                    ->reorderable()
                                    ->columns(7)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label(__('Title'))
                                            ->placeholder(__('hackable ♠'))
                                            ->prefixIcon('heroicon-o-window')
                                            ->helperText(__('Link Title'))
                                            ->columnSpan(2)
                                            ->required(),
                                        TextInput::make('url')
                                            ->label(__('URL'))
                                            ->prefixIcon('heroicon-o-link')
                                            ->helperText(__('Link URL'))
                                            ->columnSpan(3)
                                            ->required(),
                                        Select::make('target')
                                            ->columnSpan(1)
                                            ->helperText(__('Link Target'))
                                            ->label(__('Target'))
                                            ->options([
                                                '_self'  => __('Self'),
                                                '_blank' => __('New'),
                                            ])
                                            ->default('_self')
                                            ->required(),
                                        Toggle::make('is_active')
                                            ->helperText(__('Status'))
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

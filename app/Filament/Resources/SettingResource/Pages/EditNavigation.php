<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\Checkbox;
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
                Section::make(__('Navigation'))
                    ->icon('heroicon-o-bars-3-bottom-left')
                    ->description(__('Define the navigation menu of your website.'))
                    ->collapsible()
                    ->schema([
                        Group::make()
                            ->relationship('navigation')
                            ->schema([
                                Repeater::make('content')
                                    ->collapsed()
                                    ->label(__('Main Navigation'))
                                    ->defaultItems(1)
                                    ->addActionLabel(__('New Item'))
                                    ->cloneable()
                                    ->itemLabel(function (array $state): string {
                                        $title = $state['name'] ?? __('Navigation Card');

                                        return preg_replace('/<.*?>.*?<\/.*?>/', '', $title);
                                    })
                                    ->reorderable()
                                    ->columns(12)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label(__('Title'))
                                            ->placeholder(__('hackable ♠'))
                                            ->prefixIcon('heroicon-o-window')
                                            ->helperText(__('Navigation title'))
                                            ->columnSpan(6)
                                            ->required(),
                                        TextInput::make('url')
                                            ->label(__('URL'))
                                            ->prefixIcon('heroicon-o-link')
                                            ->helperText(__('Navigation URL'))
                                            ->columnSpan(6)
                                            ->required(),
                                        Toggle::make('target')
                                            ->helperText(__('Open in new tab'))
                                            ->label(__('New Tab'))
                                            ->inline(true)
                                            ->default(false)
                                            ->columnSpan(4),
                                        Toggle::make('is_secondary')
                                            ->helperText(__('Show on secondary menu'))
                                            ->label(__('Secondary Menu'))
                                            ->inline(true)
                                            ->default(false)
                                            ->columnSpan(4),
                                        Toggle::make('is_active')
                                            ->helperText(__('Status'))
                                            ->label(__('Visible'))
                                            ->inline(true)
                                            ->default(true)
                                            ->columnSpan(4),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}

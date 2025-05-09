<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeadingDescription extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.heading-description')
            ->label(__('Page Heading'))
            ->icon('heroicon-o-cube')
            ->schema([
                Tabs::make('heading_configuration')
                    ->tabs([
                        Tab::make('content')
                            ->label(__('Content'))
                            ->columns(2)
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                TextInput::make('module_name')
                                    ->prefixIcon('heroicon-o-hashtag')
                                    ->label(__('Module Name'))
                                    ->helperText(__('Identifier for this module (not shown to visitors)')),

                                TextInput::make('title')
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->label(__('Title'))
                                    ->helperText(__('Main heading text displayed on the page'))
                                    ->visible(fn (Get $get): bool => $get('is_heading_visible'))
                                    ->required(fn (Get $get): bool => $get('is_heading_visible')),

                                Textarea::make('subtitle')
                                    ->columnSpanFull()
                                    ->label(__('Subtitle'))
                                    ->helperText(__('Additional text displayed below the title'))
                                    ->visible(fn (Get $get): bool => $get('is_heading_visible')),
                            ]),

                        Tab::make('appearance')
                            ->label(__('Appearance'))
                            ->columns(4)
                            ->icon('heroicon-o-swatch')
                            ->schema([
                                Toggle::make('is_active')
                                    ->label(__('Active'))
                                    ->helperText(__('Enable or disable this section'))
                                    ->default(true)
                                    ->live(),

                                Toggle::make('is_heading_visible')
                                    ->label(__('Show Heading'))
                                    ->helperText(__('Display the title and subtitle'))
                                    ->default(true)
                                    ->live(),

                                Toggle::make('is_centered')
                                    ->label(__('Center Content'))
                                    ->helperText(__('Align content to the center instead of left'))
                                    ->default(false)
                                    ->live(),

                                Toggle::make('with_padding')
                                    ->label(__('Add Padding'))
                                    ->helperText(__('Add extra space around the content'))
                                    ->default(false)
                                    ->live(),
                            ]),

                        Tab::make('background')
                            ->columns(2)
                            ->label(__('Background'))
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Toggle::make('is_filled')
                                    ->label(__('Use Background Fill'))
                                    ->helperText(__('Add a background color to this section'))
                                    ->live(),

                                Toggle::make('is_section_filled_inverted')
                                    ->label(__('Invert Fill Colors'))
                                    ->helperText(__('Swap the background and text colors'))
                                    ->visible(fn (Get $get): bool => $get('is_filled'))
                                    ->live(),
                            ]),

                        Tab::make('button')
                            ->columns(4)
                            ->label(__('Button'))
                            ->icon('heroicon-o-cursor-arrow-rays')
                            ->schema([
                                TextInput::make('button_header')
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->label(__('Button Text'))
                                    ->helperText(__('Text to display on the button')),

                                TextInput::make('button_icon')
                                    ->prefixIcon('heroicon-o-cube')
                                    ->label(__('Button Icon'))
                                    ->helperText(__('Enter a Ionicon name (e.g., heart-outline)')),

                                Select::make('button_style')
                                    ->label(__('Button Style'))
                                    ->helperText(__('Choose a style for the button'))
                                    ->options([
                                        'outlined' => __('Outlined'),
                                        'filled'   => __('Filled'),
                                    ])
                                    ->default('outlined'),

                                TextInput::make('button_url')
                                    ->prefixIcon('heroicon-o-link')
                                    ->label(__('Button URL'))
                                    ->helperText(__('Where the button should link to'))
                                    ->url(),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

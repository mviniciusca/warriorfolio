<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class FeatureList extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.feature-list')
            ->label(__('Feature List'))
            ->icon('heroicon-o-squares-2x2')
            ->schema([
                Tabs::make('Feature List')
                    ->persistTab(true)
                    ->tabs([
                        Tabs\Tab::make(__('Cards'))
                            ->icon('heroicon-o-rectangle-stack')
                            ->schema([
                                Repeater::make('features')
                                    ->live(true)
                                    ->label(__('Feature Cards'))
                                    ->addActionLabel(__('Add New Card'))
                                    ->columnSpanFull()
                                    ->collapsed()
                                    ->collapsible()
                                    ->cloneable()
                                    ->reorderable()
                                    ->itemLabel(fn (array $state): string => strip_tags($state['title'] ?? __('Card')))
                                    ->schema([
                                        // Content Section
                                        Group::make()
                                            ->label(__('Content'))
                                            ->columnSpanFull()
                                            ->columns(2)
                                            ->schema([
                                                TextInput::make('title')
                                                    ->live(true)
                                                    ->required()
                                                    ->label(__('Title'))
                                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                                    ->placeholder(__('Enter card title'))
                                                    ->maxLength(255)
                                                    ->columnSpan(1),

                                                TextInput::make('icon')
                                                    ->label(__('Icon'))
                                                    ->prefixIcon('heroicon-o-cube')
                                                    ->placeholder('heroicon-o-star')
                                                    ->helperText(__('Icon name (e.g. heroicon-o-star)'))
                                                    ->columnSpan(1),
                                            ]),

                                        Textarea::make('description')
                                            ->label(__('Description'))
                                            ->rows(3)
                                            ->placeholder(__('Enter a brief description of this feature'))
                                            ->columnSpanFull(),

                                        // Link and Appearance Section
                                        Group::make()
                                            ->label(__('Link & Appearance'))
                                            ->columnSpanFull()
                                            ->columns(6)
                                            ->schema([
                                                TextInput::make('link')
                                                    ->label(__('Link URL'))
                                                    ->prefixIcon('heroicon-o-link')
                                                    ->placeholder('https://example.com')
                                                    ->url()
                                                    ->helperText(__('Optional link URL for this card'))
                                                    ->columnSpan(2),

                                                Select::make('role')
                                                    ->label(__('Card Style'))
                                                    ->prefixIcon('heroicon-o-swatch')
                                                    ->options([
                                                        ''          => __('Default'),
                                                        'primary'   => __('Primary'),
                                                        'secondary' => __('Secondary'),
                                                        'success'   => __('Success'),
                                                        'warning'   => __('Warning'),
                                                        'danger'    => __('Danger'),
                                                        'info'      => __('Info'),
                                                    ])
                                                    ->default('')
                                                    ->helperText(__('Choose a color theme for this card'))
                                                    ->columnSpan(2),

                                                Toggle::make('is_new_window')
                                                    ->label(__('New Tab'))
                                                    ->helperText(__('Open link in new tab'))
                                                    ->inline()
                                                    ->columnSpan(1),

                                                Toggle::make('is_card_hidden')
                                                    ->label(__('Hide Card'))
                                                    ->helperText(__('Temporarily hide this card'))
                                                    ->inline()
                                                    ->columnSpan(1),
                                            ]),
                                    ])
                                    ->addActionLabel(__('Add New Feature Card')),
                            ]),

                        Tabs\Tab::make(__('Heading'))
                            ->icon('heroicon-o-pencil')
                            ->schema([
                                Group::make()
                                    ->schema([
                                        Grid::make()
                                            ->columns(2)
                                            ->schema([
                                                Checkbox::make('is_heading_active')
                                                    ->default(true)
                                                    ->inline()
                                                    ->helperText(__('Show / Hide the title and subtitle.')),
                                                Checkbox::make('is_heading_centered')
                                                    ->default(true)
                                                    ->inline()
                                                    ->helperText(__('Center align title and subtitle.')),
                                            ]),

                                        TextInput::make('module_title')
                                            ->label(__('Title'))
                                            ->prefixIcon('heroicon-o-pencil')
                                            ->maxLength(255)
                                            ->placeholder('hackable ♠')
                                            ->helperText(__('Enter the main title for this feature section.')),

                                        Textarea::make('module_subtitle')
                                            ->label(__('Subtitle'))
                                            ->rows(2)
                                            ->helperText(__('Add a brief description or subtitle for the feature section.')),
                                    ]),
                            ]),

                        Tabs\Tab::make(__('Settings'))
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Grid::make()
                                    ->columns(4)
                                    ->schema([
                                        Checkbox::make('is_active')
                                            ->default(true)
                                            ->inline()
                                            ->helperText(__('Show / Hide this module.')),
                                        Checkbox::make('with_padding')
                                            ->default(true)
                                            ->inline()
                                            ->helperText(__('Add vertical padding.')),
                                        Checkbox::make('is_filled')
                                            ->default(false)
                                            ->inline()
                                            ->helperText(__('Fill background with dark accent color.')),
                                        Checkbox::make('is_section_filled_inverted')
                                            ->default(false)
                                            ->inline()
                                            ->helperText(__('Inverse background fill in dark/light mode.')),
                                        Checkbox::make('is_content_center')
                                            ->label(__('Center Content'))
                                            ->default(true)
                                            ->inline()
                                            ->helperText(__('Center align card content.')),
                                        Checkbox::make('is_color_icon')
                                            ->label(__('Colored Icons'))
                                            ->default(true)
                                            ->inline()
                                            ->helperText(__('Enable colored icons.')),
                                        Checkbox::make('is_card_filled')
                                            ->label(__('Card Background'))
                                            ->default(false)
                                            ->inline()
                                            ->helperText(__('Add background color to cards.')),
                                        Checkbox::make('is_light_fx')
                                            ->label(__('Light Effect'))
                                            ->default(false)
                                            ->inline()
                                            ->helperText(__('Enable hover light effect.')),
                                        Checkbox::make('is_animated')
                                            ->label(__('Animation'))
                                            ->default(false)
                                            ->inline()
                                            ->helperText(__('Enable animation effects.')),
                                        Checkbox::make('is_border')
                                            ->label(__('Border'))
                                            ->inline()
                                            ->helperText(__('Add border to cards.')),
                                        Group::make()
                                            ->schema([
                                                Select::make('columns')
                                                    ->label(__('Cards per Row'))
                                                    ->helperText(__('Select how many cards to display per row.'))
                                                    ->options([
                                                        1 => '1 Card',
                                                        2 => '2 Cards',
                                                        3 => '3 Cards',
                                                        4 => '4 Cards',
                                                    ])
                                                    ->default(3),
                                            ]),
                                    ]),

                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

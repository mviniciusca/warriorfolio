<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
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
                Section::make('Feature List')
                    ->description(__('Add a list of features to your page with icon and description.'))
                    ->icon('heroicon-o-squares-2x2')
                    ->collapsed()
                    ->schema([
                        Group::make()
                            ->schema([
                                Section::make(__('Title and Subtitle'))
                                    ->description(__('Feature List Title and Subtitle'))
                                    ->collapsed()
                                    ->columns(2)
                                    ->icon('heroicon-o-pencil')
                                    ->schema([
                                        TextInput::make('module_title')
                                            ->label(__('Title. (Optional)'))
                                            ->prefixIcon('heroicon-o-pencil')
                                            ->maxLength(255)
                                            ->placeholder('hackable ♠')
                                            ->helperText(__('The title of the feature list.')),
                                        TextInput::make('module_subtitle')
                                            ->label(__('Subtitle. (Optional)'))
                                            ->prefixIcon('heroicon-o-pencil')
                                            ->maxLength(255)
                                            ->placeholder('hackable ♠')
                                            ->helperText(__('The subtitle of the feature list.')),
                                    ]),
                                Section::make(__('Settings'))
                                    ->description(__('Feature List Settings'))
                                    ->collapsed()
                                    ->columns(3)
                                    ->icon('heroicon-o-cog-6-tooth')
                                    ->schema([
                                        Toggle::make('is_active')
                                            ->default(true)
                                            ->inline()
                                            ->helperText(__('Show / Hide this module.'))
                                            ->label(__('Show Module')),
                                        Select::make('columns')
                                            ->options([
                                                '1' => '1 Column',
                                                '2' => '2 Columns',
                                                '3' => '3 Columns',
                                                '4' => '4 Columns',
                                            ])
                                            ->default('3')
                                            ->label(__('Grid Columns'))
                                            ->helperText(__('Select the number of columns to display the cards.')),
                                        Checkbox::make('is_light_fx')
                                            ->default(false)
                                            ->inline()
                                            ->helperText(__('Light fx on top of the card.'))
                                            ->label(__('Light FX')),
                                        Checkbox::make('is_filled')
                                            ->default(false)
                                            ->inline()
                                            ->helperText(__('Fill background with dark color.'))
                                            ->label(__('Fill Section Background')),
                                        Checkbox::make('is_center')
                                            ->default(true)
                                            ->inline()
                                            ->helperText(__('Align content in the center.'))
                                            ->label(__('Centered')),
                                        Checkbox::make('is_card_filled')
                                            ->default(false)
                                            ->inline()
                                            ->helperText(__('Fill background with dark color.'))
                                            ->label(__('Fill Card Background')),
                                        Checkbox::make('is_animated')
                                            ->default(false)
                                            ->inline()
                                            ->helperText(__('Hover Animation.'))
                                            ->label(__('Animated')),
                                        Checkbox::make('is_border')
                                            ->default(false)
                                            ->inline()
                                            ->helperText(__('Show border in each card.'))
                                            ->label(__('Border')),
                                    ]),
                            ]),
                        Repeater::make('features')
                            ->columns(4)
                            ->live()
                            ->label(__('Card'))
                            ->collapsed()
                            ->cloneable()
                            ->itemLabel(function (array $state): string {
                                $title = $state['title'] ?? __('Card');

                                return preg_replace('/<.*?>.*?<\/.*?>/', '', $title);
                            })
                            ->schema([
                                TextInput::make('title')
                                    ->live()
                                    ->required()
                                    ->columnSpan(2)
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->helperText(__('The title of the feature.'))
                                    ->maxLength(255)
                                    ->label(__('Title of the feature.')),
                                TextInput::make('icon')
                                    ->label(__('Icon (optional)'))
                                    ->placeholder('icon-name')
                                    ->columnSpan(2)
                                    ->prefixIcon('heroicon-o-cube')
                                    ->maxLength(255)
                                    ->helperText(__('Ionicon Name (ex: heart-outline)')),
                                Textarea::make('description')
                                    ->columnSpanFull()
                                    ->rows(3)
                                    ->helperText(__('Here you can talk about the feature in detail.'))
                                    ->label('Description (optional)'),
                                Group::make()
                                    ->columnSpanFull()
                                    ->columns(3)
                                    ->schema([
                                        TextInput::make('link')
                                            ->columnSpan(2)
                                            ->label(__('Link (Optional)'))
                                            ->helperText(__('URL Link to this card. Optional.'))
                                            ->prefixIcon('heroicon-o-link'),
                                        Toggle::make('is_new_window')
                                            ->inline(false)
                                            ->label(__('New Window'))
                                            ->helperText(__('Opens in a new Window')),
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

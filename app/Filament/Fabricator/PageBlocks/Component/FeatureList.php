<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
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
                    ->description(__('Add a list of features to your page with title, subtitle, icon and description.'))
                    ->icon('heroicon-o-squares-2x2')
                    ->collapsed()
                    ->schema([
                        Group::make()
                            ->columns(2)
                            ->schema([
                                Checkbox::make('is_active')
                                    ->default(true)
                                    ->inline()
                                    ->helperText(__('Show / Hide this module.'))
                                    ->label(__('Show Module')),
                                Checkbox::make('is_filled')
                                    ->default(false)
                                    ->inline()
                                    ->helperText(__('Fill background with dark color.'))
                                    ->label(__('Fill Section Background')),
                            ]),
                        Group::make()
                            ->schema([
                                Section::make(__('Title and Subtitle'))
                                    ->description(__('Feature List Title and Subtitle'))
                                    ->collapsed()
                                    ->columns(1)
                                    ->icon('heroicon-o-pencil')
                                    ->schema([
                                        Group::make()
                                            ->columns(2)
                                            ->schema([
                                                Checkbox::make('is_center')
                                                    ->default(true)
                                                    ->helperText(__('Align the Title and Subtitle to the center.'))
                                                    ->label(__('Align to Center')),
                                            ]),
                                        TextInput::make('module_title')
                                            ->label(__('Title. (Optional)'))
                                            ->prefixIcon('heroicon-o-pencil')
                                            ->maxLength(255)
                                            ->placeholder('hackable ♠')
                                            ->helperText(__('The title of the feature list.')),
                                        TextInput::make('module_subtitle')
                                            ->label(__('Subtitle. (Optional)'))
                                            ->prefixIcon('heroicon-o-pencil')
                                            ->maxLength(500)
                                            ->placeholder('hackable ♠')
                                            ->helperText(__('The subtitle of the feature list.')),
                                    ]),
                                Section::make(__('Settings'))
                                    ->description(__('Feature List Settings'))
                                    ->collapsed()
                                    ->columns(2)
                                    ->icon('heroicon-o-cog-6-tooth')
                                    ->schema([

                                        Group::make()
                                            ->schema([
                                                Radio::make('columns')
                                                    ->columns(2)
                                                    ->options([
                                                        1 => '1 Card',
                                                        2 => '2 Cards',
                                                        3 => '3 Cards',
                                                        4 => '4 Cards',
                                                    ])
                                                    ->default(3)
                                                    ->label(__('Card Grid'))
                                                    ->helperText(__('Select the number of columns to display the cards. Default is 3.')),

                                                Checkbox::make('is_content_center')
                                                    ->default(true)
                                                    ->helperText(__('Align the card content to the center.'))
                                                    ->label(__('Align to Center')),

                                                Checkbox::make('is_color_icon')
                                                    ->default(true)
                                                    ->helperText(__('Color the icon with the primary color.'))
                                                    ->label(__('Color Icon')),

                                            ]),

                                        Group::make()
                                            ->schema([
                                                Checkbox::make('is_card_filled')
                                                    ->default(false)
                                                    ->helperText(__('Fill background with dark color.'))
                                                    ->label(__('Fill Card Background')),
                                                Checkbox::make('is_light_fx')
                                                    ->default(false)
                                                    ->helperText(__('Light fx on top of the card.'))
                                                    ->label(__('Light FX')),
                                                Checkbox::make('is_animated')
                                                    ->default(false)
                                                    ->helperText(__('Applies animation to the card icon.'))
                                                    ->label(__('Animated')),
                                                Checkbox::make('is_border')
                                                    ->helperText(__('Show border in each card.'))
                                                    ->label(__('With Border')),
                                            ]),
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

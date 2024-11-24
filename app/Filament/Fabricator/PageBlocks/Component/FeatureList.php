<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
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
                            ->columns(2)
                            ->schema([
                                Toggle::make('is_active')
                                    ->default(true)
                                    ->label(__('Show Module')),
                                Toggle::make('is_center')
                                    ->default(true)
                                    ->label(__('Centered Content')),
                            ]),
                        Repeater::make('features')
                            ->columns(4)
                            ->live()
                            ->label(__('Card'))
                            ->collapsed()
                            ->cloneable()
                            ->itemLabel(fn (array $state): string => $state['title'] ?? __('Card'))
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

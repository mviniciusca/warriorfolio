<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
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
                            ->collapsed()
                            ->cloneable()
                            ->label(__('List'))
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->columnSpan(2)
                                    ->helperText(__('The title of the feature. Max: 255 characters.'))
                                    ->maxLength(255)
                                    ->label(__('Title of the feature.')),
                                TextInput::make('icon')
                                    ->label(__('Icon (optional)'))
                                    ->prefix('ion-icon')
                                    ->placeholder('icon-name')
                                    ->columnSpan(2)
                                    ->maxLength(255)
                                    ->helperText(__('Ionicon Name (without the ion-icon prefix)')),
                                Textarea::make('description')
                                    ->columnSpanFull()
                                    ->maxLength(5000)
                                    ->rows(3)
                                    ->helperText(__('Here you can talk about the feature in detail. Max: 5000 characters.'))
                                    ->label('Description (optional)'),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

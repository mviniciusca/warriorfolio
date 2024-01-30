<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class FeatureList extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.feature-list')
            ->schema([
                Toggle::make('is_active')
                    ->default(true)
                    ->required()
                    ->label('Is Active'),
                Repeater::make('features')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->label('Title of the feature'),
                        TextInput::make('icon')
                            ->label('Icon')
                            ->prefix('ion-icon')
                            ->default('flash-outline')
                            ->placeholder('name of the icon'),
                        Textarea::make('description')
                            ->label('Description'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

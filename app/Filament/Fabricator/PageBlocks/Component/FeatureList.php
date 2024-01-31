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
                    ->label('Show Module'),
                Repeater::make('features')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->columnSpan(2)
                            ->label('Title of the feature'),
                        TextInput::make('icon')
                            ->label('Icon (optional)')
                            ->prefix('ion-icon')
                            ->placeholder('icon-name')
                            ->columnSpan(2)
                            ->helperText('Ionicon Name (without the ion-icon prefix)'),
                        Textarea::make('description')
                            ->columnSpanFull()
                            ->rows(3)
                            ->helperText('Here you can talk about the feature in detail.')
                            ->label('Description'),
                    ])->columns(4),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

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
            ->label('Feature Icon List Component')
            ->icon('heroicon-o-cube')
            ->schema([
                Section::make('Component: Feature Icon List')
                    ->description('Add a list of features to your page with icon and description.')
                    ->icon('heroicon-o-rectangle-stack')
                    ->collapsed()
                    ->schema([
                        Group::make()->columns(2)->schema([
                            Toggle::make('is_active')
                                ->default(true)
                                ->label('Show Module'),
                            Toggle::make('is_center')
                                ->default(true)
                                ->label('Centered Content'),
                        ]),
                        Repeater::make('features')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->columnSpan(2)
                                    ->helperText('The title of the feature. Max: 255 characters.')
                                    ->maxLength(255)
                                    ->label('Title of the feature.'),
                                TextInput::make('icon')
                                    ->label('Icon (optional)')
                                    ->prefix('ion-icon')
                                    ->placeholder('icon-name')
                                    ->columnSpan(2)
                                    ->maxLength(255)
                                    ->helperText('Ionicon Name (without the ion-icon prefix)'),
                                Textarea::make('description')
                                    ->columnSpanFull()
                                    ->maxLength(5000)
                                    ->rows(3)
                                    ->helperText('Here you can talk about the feature in detail. Max: 5000 characters.')
                                    ->label('Description (optional)'),
                            ])->columns(4)->collapsed(),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

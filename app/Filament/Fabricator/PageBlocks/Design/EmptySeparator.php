<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class EmptySeparator extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.empty-separator')
            ->label(__('Vertical Space'))
            ->icon('heroicon-o-arrows-pointing-out')
            ->schema([
                Section::make(__('Vertical Space'))
                    ->description(__('Add a vertical space in your page.'))
                    ->icon('heroicon-o-arrows-pointing-out')
                    ->collapsed()
                    ->schema([
                        Select::make('vertical_space')
                            ->label(__('Vertical Padding (py)'))
                            ->helperText(__('Select the padding size for the separator.'))
                            ->options([
                                'xs' => __('Extra Small'),
                                'sm' => __('Small'),
                                'md' => __('Medium'),
                                'lg' => __('Large'),
                                'xl' => __('Extra Large'),
                            ])
                            ->default('xs'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

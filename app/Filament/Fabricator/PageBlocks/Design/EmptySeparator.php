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
                                'py-1 md:py-2 lg:py-4'    => __('Extra Small'),
                                'py-3 md:py-6 lg:py-12'   => __('Small'),
                                'py-6 md:py-12 lg:py-24'  => __('Medium'),
                                'py-12 md:py-24 lg:py-48' => __('Large'),
                                'py-24 md:py-48 lg:py-96' => __('Extra Large'),
                            ])
                            ->default('py-3 md:py-6 lg:py-12')
                            ->required(),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

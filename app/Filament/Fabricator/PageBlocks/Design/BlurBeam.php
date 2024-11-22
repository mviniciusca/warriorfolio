<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BlurBeam extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.blur-beam')
            ->label(__('Light Beam'))
            ->icon('heroicon-o-bolt')
            ->schema([
                Section::make(__('Light Beam Separator'))
                    ->description(__('Add a light beam in your page.'))
                    ->icon('heroicon-o-bolt')
                    ->collapsed()
                    ->schema([
                        Select::make('color')
                            ->helperText(__('Select the color or style of the light. Default color is pink.'))
                            ->required()
                            ->options([
                                'black'   => __('Black'),
                                'blur'    => __('Blur'),
                                'pink'    => __('Pink'),
                                'rainbow' => __('Rainbow'),
                                'white'   => __('White'),
                            ])
                            ->default('pink'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BlurBackground extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.blur-background')
            ->schema([
                //
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
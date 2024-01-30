<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BlurBlack extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.blur-black')
            ->schema([
                //
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
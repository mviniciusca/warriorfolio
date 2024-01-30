<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BlurBeam extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.blur-beam')
            ->schema([
                //
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
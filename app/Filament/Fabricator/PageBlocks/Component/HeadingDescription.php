<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeadingDescription extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.heading-description')
            ->schema([
                //
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

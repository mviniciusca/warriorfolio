<?php

namespace App\Filament\Fabricator\PageBlocks\Portfolio;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Project extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('portfolio.project')
            ->hidden()
            ->schema([
                //
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

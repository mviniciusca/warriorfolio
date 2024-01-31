<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BlurBeam extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.blur-beam')
            ->schema([
                Section::make('Design: Beam Blur')
                    ->description('Add a beam blur to your page.')
                    ->icon('heroicon-o-paint-brush')
                    ->collapsed()
                    ->schema([
                        Info::make()->schema([]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

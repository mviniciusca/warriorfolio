<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Layout;
use App\Models\Setting;
use App\Models\Slideshow;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Hero extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('hero')
            ->schema([
                //
            ]);
    }

    public static function mutateData(array $data): array
    {

        $data = [
            'info' => Layout::all()->first(),
            'hero' => Setting::all()->first()
        ];
        return $data;
    }
}

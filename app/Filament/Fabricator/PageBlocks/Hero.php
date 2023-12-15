<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Setting;
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
            'hero' => Setting::get()->firstOrFail(),
        ];
        return $data;
    }
}

<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Header extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('header')
            ->schema([
                Section::make('Core: Header')
                    ->description('Add a header to your page.')
                    ->icon('heroicon-o-bars-3')
                    ->collapsed()
                    ->schema([
                        Info::make()
                    ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

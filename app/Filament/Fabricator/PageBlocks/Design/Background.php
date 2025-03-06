<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

/**
 * @deprecated Since v2.1.0, march 2025, Background Image is now a core module. This block has no effect anymore. This is will be automatically hidden from your page block list. To avoid any issue in the future, please remove this block from your page block list.
 */
class Background extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.background')
            ->icon('heroicon-o-photo')
            ->hidden()
            ->label(__('Background Image'))
            ->schema([
                Section::make(__('Background Image'))
                    ->description(__('Add a background image to your page.'))
                    ->icon('heroicon-o-photo')
                    ->collapsed()
                    ->schema([
                        Info::make()
                            ->schema([
                                Hidden::make('id'),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

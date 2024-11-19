<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Header extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('header')
            ->label('Header Module')
            ->icon('heroicon-o-bars-3-bottom-right')
            ->schema([
                Section::make('Core: Header')
                    ->description('Add a header to your page.')
                    ->icon('heroicon-o-bars-3-bottom-right')
                    ->collapsed()
                    ->schema([
                        Info::make()->schema([
                            TextInput::make('active')
                                ->hidden()
                                ->label('Title')
                                ->maxLength(1),
                        ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

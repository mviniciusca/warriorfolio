<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Newsletter extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('newsletter')
            ->label('Newsletter Module')
            ->icon('heroicon-o-envelope')
            ->schema([
                Section::make('Core: Newsletter Section Module')
                    ->description('Add a newsletter section module to your page.')
                    ->icon('heroicon-o-envelope')
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

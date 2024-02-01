<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BlurBeam extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.blur-beam')
            ->label('Rainbow Beam')
            ->icon('heroicon-o-paint-brush')
            ->schema([
                Section::make('Design: Beam Blur Separator')
                    ->description('Add a rainbow beam separator to your page.')
                    ->icon('heroicon-o-paint-brush')
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

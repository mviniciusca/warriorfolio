<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BlurBlack extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.blur-black')
            ->label('Black Beam')
            ->icon('heroicon-o-paint-brush')
            ->schema([
                Section::make('Design: Beam Black Separator')
                    ->description('Add a black beam separator to your page.')
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

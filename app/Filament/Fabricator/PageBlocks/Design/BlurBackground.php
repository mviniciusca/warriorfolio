<?php

namespace App\Filament\Fabricator\PageBlocks\Design;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class BlurBackground extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('design.blur-background')
            ->label('Blue/Purple Beam')
            ->icon('heroicon-o-paint-brush')
            ->schema([
                Section::make('Design: Beam Blur/Purple Separator')
                    ->description('Add a blue/purple beam separator to your page.')
                    ->icon('heroicon-o-paint-brush')
                    ->collapsed()
                    ->schema([
                        Info::make()->schema([
                            TextInput::make('beam_background_active')
                                ->hidden()
                                ->label('Title')
                                ->helperText('This active the blur background.')
                                ->maxLength(1),
                        ]),
                    ]),
                //
            ]);
    }


    public static function mutateData(array $data): array
    {
        return $data;
    }
}

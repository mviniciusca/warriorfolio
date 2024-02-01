<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Layout;
use App\Models\Setting;
use App\Models\Slideshow;
use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Hero extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('hero')
            ->label('Hero Section Module')
            ->icon('heroicon-o-cpu-chip')
            ->schema([
                Section::make('Core: Hero Section Module')
                    ->description('Add a hero section to your page.')
                    ->icon('heroicon-o-cpu-chip')
                    ->collapsed()
                    ->schema([
                        Info::make()->schema([
                            TextInput::make('active')
                                ->hidden()
                                ->label('Title')
                                ->maxLength(1),
                        ]),
                    ])
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

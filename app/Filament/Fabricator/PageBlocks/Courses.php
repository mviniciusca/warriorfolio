<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Profile;
use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Courses extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('courses')
            ->label('About, Courses & Profile Module')
            ->icon('heroicon-o-cpu-chip')
            ->schema([
                Section::make('Core: About Me, Profile & Courses Section Module')
                    ->description('Add a about me, profile & courses section module to your page.')
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
        return $data;
    }
}

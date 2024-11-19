<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Forms\Components\Core\Info;
use App\Models\Profile;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Courses extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('courses')
            ->label('About You Section')
            ->icon('heroicon-o-academic-cap')
            ->schema([
                Section::make('Core: About Me, Profile & Courses Section Module')
                    ->description('Add a about me, profile & courses section module to your page.')
                    ->icon('heroicon-o-academic-cap')
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

<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Courses extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('courses')
            ->label(__('Profile Section'))
            ->icon('heroicon-o-academic-cap')
            ->schema([
                Section::make(__('Core: Profile Section'))
                    ->description(__('Core Module with About, Profile and Courses'))
                    ->icon('heroicon-o-academic-cap')
                    ->collapsed()
                    ->schema([
                        Info::make()
                            ->schema([
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

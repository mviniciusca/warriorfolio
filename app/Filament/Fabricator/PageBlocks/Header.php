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
            ->label(__('Navigation Module'))
            ->icon('heroicon-o-bars-3-bottom-right')
            ->schema([
                Section::make('Core: Navigation Header')
                    ->description(__('Add a Header Module with Logo and Menu Navigation.'))
                    ->icon('heroicon-o-bars-3-bottom-right')
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

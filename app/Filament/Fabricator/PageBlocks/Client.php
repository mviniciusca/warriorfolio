<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Client extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('client')
            ->label('Customer Module')
            ->icon('heroicon-o-building-office-2')
            ->schema([
                Section::make(__('Core: Customer Section'))
                    ->description(__('Add a Customer Section Module to your page.'))
                    ->icon('heroicon-o-building-office-2')
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

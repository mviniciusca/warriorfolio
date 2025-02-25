<?php

namespace App\Filament\Fabricator\PageBlocks\Blog;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Homepage extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('blog.homepage')
            ->label(__('Notes'))
            ->icon('heroicon-o-pencil')
            ->schema([
                Section::make('Core: Notes Homepage')
                    ->description('Add a homepage feed from your Notes.')
                    ->icon('heroicon-o-pencil')
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

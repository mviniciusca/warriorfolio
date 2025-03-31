<?php

namespace App\Filament\Fabricator\PageBlocks\Blog;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class FeaturedPosts extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('blog.featured-posts')
            ->icon('heroicon-o-newspaper')
            ->label(__('Latest Posts'))
            ->schema([
                Section::make('Core: Notes Latest Posts')
                    ->description('Latest posts from your Notes.')
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

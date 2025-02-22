<?php

namespace App\Filament\Fabricator\PageBlocks\Blog;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class FeaturedPosts extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('blog.featured-posts')
            ->schema([
                //
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
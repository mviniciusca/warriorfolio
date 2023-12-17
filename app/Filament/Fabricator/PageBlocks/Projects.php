<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Project;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Projects extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('projects')
            ->schema([
                //
            ]);
    }

    public static function mutateData(array $data): array
    {
        $data['projects'] = Project::all()
            ->where('is_active', true)
            ->sortByDesc('created_at');
        return $data;
    }
}

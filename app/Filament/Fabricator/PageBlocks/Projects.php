<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Project;
use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Projects extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('projects')
            ->label('Projects Module')
            ->icon('heroicon-o-cpu-chip')
            ->schema([
                Section::make('Core: Projects Section Module')
                    ->description('Add a projects section module to your page')
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
        $data['projects'] = Project::all()
            ->where('is_active', true)
            ->sortByDesc('created_at');
        return $data;
    }
}

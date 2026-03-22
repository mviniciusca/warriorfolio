<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Forms\Components\Core\Info;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class GithubRepositories extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('github-repositories')
            ->label(__('GitHub Repositories'))
            ->icon('heroicon-o-code-bracket-square')
            ->schema([
                Section::make(__('Core: GitHub Repositories Module'))
                    ->description(__('Shows your GitHub contribution graph and repository grid. Configure username, token, and visibility under Settings → API Keys & Integrations → GitHub.'))
                    ->icon('heroicon-o-code-bracket-square')
                    ->collapsed()
                    ->schema([
                        Info::make()->schema([
                            TextInput::make('active')
                                ->hidden()
                                ->label('active')
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

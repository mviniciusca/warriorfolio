<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Group;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Slider extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.slider')
            ->schema([
                Group::make()->schema([
                    Toggle::make('is_active')
                        ->label('Show Module')
                        ->default(true),
                ])->columns(3),
                Section::make('Slider Module')
                    ->icon('heroicon-o-photo')
                    ->description('Display a slider of images.')
                    ->collapsible()->schema([
                            Repeater::make('slides')
                                ->schema([
                                    FileUpload::make('image')
                                        ->image()
                                        ->required()
                                        ->imageEditor()
                                ])->collapsible()
                        ])->collapsed()
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeadingDescription extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.heading-description')
            ->label('Heading Description Component')
            ->icon('heroicon-o-cube')
            ->schema([
                Section::make('Component: Heading Description')
                    ->description('Add a heading description to your page.')
                    ->icon('heroicon-o-cube')
                    ->collapsed()
                    ->schema([
                        Toggle::make('is_center')
                            ->label('Align text center')
                            ->default(false),
                        TextInput::make('heading')
                            ->label('Heading')
                            ->placeholder('Enter a heading')
                            ->required(),
                        RichEditor::make('content')
                            ->label('Description')
                            ->placeholder('Enter a description')
                            ->required(),
                    ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

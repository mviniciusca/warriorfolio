<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Faker\Provider\ar_EG\Text;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Module extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.module')
            ->schema([
                Toggle::make('is_active')
                    ->label('Is Active')
                    ->default(true),
                TextInput::make('module_name')
                    ->label('Module Name')
                    ->required()
                    ->placeholder('Module Name'),
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->placeholder('Title'),
                TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->placeholder('Subtitle'),
                RichEditor::make('content')
                    ->label('Content')
                    ->placeholder('Content'),
                TextInput::make('attributes')
                    ->label('Attributes')
                    ->placeholder('Tailwind CSS Attributes'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

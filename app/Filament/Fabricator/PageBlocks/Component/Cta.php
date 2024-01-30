<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Cta extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.cta')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('Title'),
                FileUpload::make('image')
                    ->columnSpanFull()
                    ->label('Image')
                    ->required()
                    ->imageEditor()
                    ->directory('images/content')
                    ->moveFiles()
                    ->image(),
                RichEditor::make('content')
                    ->columnSpanFull()
                    ->label('Content')
                    ->required()
                    ->placeholder('Content'),
                TextInput::make('button_text')
                    ->label('Button Text')
                    ->required()
                    ->placeholder('Button Text'),
                TextInput::make('button_url')
                    ->label('Button URL')
                    ->default('#')
                    ->required()
                    ->placeholder('Button URL'),
                TextInput::make('button_icon')
                    ->label('Button Icon')
                    ->placeholder('Button Icon'),
            ])->columns(3);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

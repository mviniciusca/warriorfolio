<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Cta extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.cta')
            ->label('CTA Image + Text')
            ->icon('heroicon-o-cube')
            ->schema([
                Section::make('Core: CTA Module')
                    ->description('This module is composed of a title, image, content, button text, button URL, and button icon.')
                    ->icon('heroicon-o-cube')
                    ->collapsed()
                    ->schema([
                        FileUpload::make('image')
                            ->columnSpanFull()
                            ->label('Image')
                            ->required()
                            ->imageEditor()
                            ->helperText('The image of the CTA module.')
                            ->directory('images/content')
                            ->moveFiles()
                            ->image(),
                        TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(200)
                            ->helperText('The title of the CTA module. Max: 200 characters.')
                            ->placeholder('Title'),
                        RichEditor::make('content')
                            ->columnSpanFull()
                            ->label('Content')
                            ->required()
                            ->maxLength(500)
                            ->helperText('The content of the CTA module. Max: 500 characters.')
                            ->placeholder('Content'),
                        TextInput::make('button_text')
                            ->label('Button Text (optional)')
                            ->maxLength(50)
                            ->helperText('The text of the button. Max: 50 characters.')
                            ->placeholder('Button Text'),
                        TextInput::make('button_url')
                            ->label('Button URL (optional)')
                            ->maxLength(200)
                            ->helperText('The URL of the button. Max: 200 characters.')
                            ->placeholder('Button URL'),
                        TextInput::make('button_icon')
                            ->label('Button Icon (optional)')
                            ->default('chevron-forward-outline')
                            ->placeholder('Button Icon'),
                    ])->columns(3),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

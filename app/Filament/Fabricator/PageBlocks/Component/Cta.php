<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Cta extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.cta')
            ->label(__('cta'))
            ->icon('heroicon-o-square-3-stack-3d')
            ->schema([
                Section::make('CTA')
                    ->description(__('Add a CTA to your page.'))
                    ->icon('heroicon-o-square-3-stack-3d')
                    ->collapsed()
                    ->schema([
                        Repeater::make('content')
                            ->columns(3)
                            ->label(__('CTA'))
                            ->schema([
                                Group::make()
                                    ->schema([
                                        Toggle::make('is_invert')
                                            ->inline(false)
                                            ->label(__('Invert Position')),
                                        FileUpload::make('image')
                                            ->columnSpan(2)
                                            ->label(__('Image'))
                                            ->required()
                                            ->imageEditor()
                                            ->helperText(__('Featured Image'))
                                            ->directory('images/content')
                                            ->image(),
                                    ]),
                                Group::make()
                                    ->columnSpan(2)
                                    ->schema([
                                        TextInput::make('title')
                                            ->columnSpanFull()
                                            ->label(__('Title'))
                                            ->required()
                                            ->maxLength(200)
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->helperText('The title of the CTA module. Max: 200 characters.')
                                            ->placeholder('Title'),
                                        TextInput::make('button_text')
                                            ->columnSpanFull()
                                            ->label(__('Button Text (optional'))
                                            ->maxLength(50)
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->helperText('The text of the button. Max: 50 characters.')
                                            ->placeholder('Button Text'),
                                        TextInput::make('button_url')
                                            ->columnSpanFull()
                                            ->prefixIcon('heroicon-o-link')
                                            ->label('Button URL (optional)')
                                            ->maxLength(200)
                                            ->helperText('The URL of the button. Max: 200 characters.')
                                            ->placeholder('Button URL'),
                                    ]),

                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

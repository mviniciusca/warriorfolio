<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Cta extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.cta')
            ->label(__('CTA'))
            ->icon('heroicon-o-square-3-stack-3d')
            ->schema([
                Section::make(__('CTA'))
                    ->description(__('Add a CTA to your page.'))
                    ->icon('heroicon-o-square-3-stack-3d')
                    ->collapsed()
                    ->schema([
                        Toggle::make('is_active')
                            ->default(true)
                            ->label(__('Show Module')),
                        Repeater::make('content')
                            ->collapsible()
                            ->cloneable()
                            ->columns(3)
                            ->label(__('CTA'))
                            ->addActionLabel(__('New Item'))
                            ->itemLabel(__('Card'))
                            ->schema([
                                Group::make()
                                    ->schema([
                                        Toggle::make('is_invert')
                                            ->inline(false)
                                            ->default(false)
                                            ->helperText(__('Invert the original position for the current card.'))
                                            ->label(__('Invert Position')),
                                        FileUpload::make('image')
                                            ->columnSpan(2)
                                            ->label(__('Image'))
                                            ->required()
                                            ->imageEditor()
                                            ->helperText(__('Featured Image.'))
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
                                        Textarea::make('description')
                                            ->label(__('Description'))
                                            ->rows(3)
                                            ->helperText(__('Description for the current card.')),
                                        TextInput::make('button_text')
                                            ->columnSpanFull()
                                            ->label(__('Button Text (optional'))
                                            ->maxLength(50)
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->helperText('The text of the button. Max: 50 characters.')
                                            ->placeholder('Button Text'),
                                        Group::make()
                                            ->columns(3)
                                            ->schema([
                                                TextInput::make('button_url')
                                                    ->prefixIcon('heroicon-o-link')
                                                    ->label('Button URL (optional)')
                                                    ->maxLength(200)
                                                    ->columnSpan(2)
                                                    ->helperText('The URL of the button. Max: 200 characters.')
                                                    ->placeholder('Button URL'),
                                                Toggle::make('is_blank')
                                                    ->helperText(__('Link Target'))
                                                    ->label(__('New Window'))
                                                    ->inline(false),
                                            ]),

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

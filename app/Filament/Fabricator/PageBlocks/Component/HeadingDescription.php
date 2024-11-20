<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeadingDescription extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.heading-description')
            ->label(__('Heading Title'))
            ->icon('heroicon-o-information-circle')
            ->schema([
                Section::make(__('Heading Title and Subtitle'))
                    ->description(__('Add a heading and subtitle to your page.'))
                    ->icon('heroicon-o-information-circle')
                    ->collapsed()
                    ->columns(4)
                    ->schema([
                        Toggle::make('is_active')
                            ->label(__('Show Module'))
                            ->inline(false)
                            ->default(true),
                        Toggle::make('is_center')
                            ->label(__('Align to Center'))
                            ->inline(false)
                            ->default(true),
                        Select::make('heading_text_size')
                            ->label('Heading Text Size')
                            ->options([
                                'text-2xl' => __('Large 2XL'),
                                'text-3xl' => __('Default 3XL'),
                                'text-4xl' => __('Text 4XL'),
                                'text-5xl' => __('Text 5XL'),
                                'text-6xl' => __('Text 6XL'),
                            ])
                            ->default('text-3xl'),
                        Select::make('content_text_size')
                            ->label('Description Text Size')
                            ->options([
                                'text-xs'   => __('Extra Small'),
                                'text-sm'   => __('Small'),
                                'text-base' => __('Default'),
                                'text-lg'   => __('Large'),
                                'text-xl'   => __('Extra Large'),
                                'text-2xl'  => __('Super Large'),
                            ])
                            ->default('text-base'),
                        Textarea::make('heading')
                            ->label(__('Description'))
                            ->helperText(__('HTML Allowed. Use class "tl" to highlight a word.'))
                            ->columnSpanFull()
                            ->maxLength(300)
                            ->required()
                            ->rows(2),
                        Textarea::make('content')
                            ->label(__('Content'))
                            ->helperText(__('HTML Allowed. Use class "tl" to highlight a word.'))
                            ->columnSpanFull()
                            ->maxLength(300)
                            ->required()
                            ->rows(2),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

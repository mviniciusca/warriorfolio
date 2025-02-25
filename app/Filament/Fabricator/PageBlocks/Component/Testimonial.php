<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Testimonial extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.testimonial')
            ->icon('heroicon-o-chat-bubble-left-right')
            ->label('Testimonial')
            ->schema([
                Section::make('Testimonial')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->description('The testimonial component')
                    ->columns(2)
                    ->collapsed()
                    ->schema([
                        Group::make()->schema([
                            Toggle::make('is_active')
                                ->default(true)
                                ->helperText(__('Show this Module'))
                                ->label('Active'),
                            Toggle::make('bg_transparent')
                                ->helperText(__('Set the transparent background'))
                                ->label('No Background')
                                ->default(false),
                        ])
                            ->columnSpanFull()
                            ->columns(2),
                        Group::make()
                            ->schema([
                                TextInput::make('author')
                                    ->required()
                                    ->label('Author')
                                    ->helperText(__('The author of the testimonial')),
                                TextInput::make('author_info')
                                    ->label('Author Info')
                                    ->helperText(__('Info about the author. E.g. CEO of Company')),
                                Textarea::make('testimonial')
                                    ->label('Testimonial')
                                    ->rows(3)
                                    ->required()
                                    ->columnSpanFull()
                                    ->helperText(__('The testimonial.')),
                            ]),
                        Group::make()->schema([
                            CuratorPicker::make('picture')
                                ->size('sm')
                                ->buttonLabel(__('Select picture'))
                                ->columnSpanFull()
                                ->directory('public/testimonial')
                                ->label(__('Author Picture'))
                                ->helperText(__('The picture of the author')),
                        ]),

                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

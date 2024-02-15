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
            ->icon('heroicon-o-cube')
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
                                ->label('Active'),
                            Toggle::make('bg_transparent')
                                ->label('Transparent Background')
                                ->default(false),
                        ])
                            ->columnSpanFull()
                            ->columns(2),
                        Group::make()->schema([
                            TextInput::make('author')
                                ->required()
                                ->label('Author')
                                ->helperText('The author of the testimonial'),
                            TextInput::make('author_info')
                                ->label('Author Info')
                                ->helperText('Info about the author. E.g. CEO of company'),
                            Textarea::make('testimonial')
                                ->label('Testimonial')
                                ->rows(3)
                                ->required()
                                ->columnSpanFull()
                                ->helperText('The testimonial text'),
                        ]),
                        Group::make()->schema([
                            CuratorPicker::make('picture')
                                ->size('sm')
                                ->buttonLabel('Select picture')
                                ->columnSpanFull()
                                ->directory('public/testimonial')
                                ->label('Author picture')
                                ->helperText('The picture of the author'),
                        ]),

                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

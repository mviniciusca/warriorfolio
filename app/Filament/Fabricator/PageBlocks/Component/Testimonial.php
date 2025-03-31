<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
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
                Section::make(__('Testimonial'))
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->description(__('Add a testimonial to your page'))
                    ->collapsed()
                    ->schema([
                        Group::make()
                            ->columns(4)
                            ->schema([
                                Checkbox::make('is_active')
                                    ->default(true)
                                    ->helperText(__('Show this Module'))
                                    ->label('Active'),
                                Checkbox::make('with_padding')
                                    ->helperText(__('Add/Remove vertical padding to the component'))
                                    ->label('Vertical Padding')
                                    ->default(false),
                                Checkbox::make('is_bg_filled')
                                    ->helperText(__('Set the transparent background'))
                                    ->label('Filled Background')
                                    ->default(false),
                                Checkbox::make('is_filled_inverted')
                                    ->helperText(__('Invert the colors of component.'))
                                    ->label('Filled Inverted')
                                    ->default(false),
                            ]),
                        Group::make()
                            ->columns(2)
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
                        Group::make()
                            ->columns(2)
                            ->schema([
                                CuratorPicker::make('picture')
                                    ->size('sm')
                                    ->buttonLabel(__('Select picture'))
                                    ->directory('public/testimonial')
                                    ->label(__('Author Picture'))
                                    ->helperText(__('The picture of the author')),
                                Select::make('text_size')
                                    ->options([
                                        'text-sm'                         => 'Small',
                                        'text-base'                       => 'Base',
                                        'text-lg'                         => 'Large',
                                        'text-xl'                         => 'Extra Large',
                                        'text-lg md:text-xl lg:text-2xl'  => '2x Large',
                                        'text-lg md:text-xl lg:text-3xl'  => '3x Large',
                                        'text-lg md:text-2xl lg:text-4xl' => '4x Large',

                                    ])
                                    ->default('text-lg md:text-xl lg:text-2xl')
                                    ->label('Testimonial Font Size')
                                    ->helperText(__('The size of the text')),
                            ]),

                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

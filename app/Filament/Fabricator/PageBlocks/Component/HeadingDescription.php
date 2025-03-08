<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeadingDescription extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.heading-description')
            ->label(__('Module Creator'))
            ->icon('heroicon-o-cube')
            ->schema([
                Section::make(__('Module Creator'))
                    ->description(__('Create a module with a heading and description.'))
                    ->icon('heroicon-o-cube')
                    ->collapsed()
                    ->columns(4)
                    ->schema([
                        Group::make()
                            ->columns(4)
                            ->columnSpanFull()
                            ->schema([
                                Section::make()
                                    ->description(__('Settings'))
                                    ->icon('heroicon-o-cog-6-tooth')
                                    ->collapsed()
                                    ->columns(3)
                                    ->schema([
                                        Group::make()
                                            ->schema([
                                                Checkbox::make('is_active')
                                                    ->label(__('Show Module'))
                                                    ->helperText(__('Show or hide this module.'))
                                                    ->default(true),
                                                Checkbox::make('is_center')
                                                    ->label(__('Align to Center'))
                                                    ->helperText(__('Align the content to the center.'))
                                                    ->default(true),
                                            ]),
                                        Group::make()
                                            ->columnSpan(2)
                                            ->schema([
                                                TextInput::make('module_id')
                                                    ->live(true)
                                                    ->label(__('Module Name'))
                                                    ->prefixIcon('heroicon-o-hashtag')
                                                    ->maxLength(255)
                                                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                                        if ($state !== null) {
                                                            $set('module_id', Str::slug($state));
                                                        }
                                                    })
                                                    ->placeholder(__('slug generated automatically'))
                                                    ->helperText(__('You can use this ID to link to this module in navigation or other pages.')),
                                            ]),
                                    ]),
                                // Select::make('heading_text_size')
                                //     ->label('Heading Text Size')
                                //     ->options([
                                //         'sm:text-lg md:text-lg lg:text-2xl'  => __('Large 2XL'),
                                //         'sm:text-lg md:text-xl lg:text-3xl'  => __('Default 3XL'),
                                //         'sm:text-lg md:text-2xl lg:text-4xl' => __('Text 4XL'),
                                //         'sm:text-lg md:text-3xl lg:text-5xl' => __('Text 5XL'),
                                //         'sm:text-lg md:text-4xl lg:text-6xl' => __('Text 6XL'),
                                //     ])
                                //     ->default('text-3xl'),
                                // Select::make('content_text_size')
                                //     ->label('Description Text Size')
                                //     ->options([
                                //         'text-xs'   => __('Extra Small'),
                                //         'text-sm'   => __('Small'),
                                //         'text-base' => __('Default'),
                                //         'text-lg'   => __('Large'),
                                //         'text-xl'   => __('Extra Large'),
                                //         'text-2xl'  => __('Super Large'),
                                //     ])
                                //     ->default('text-base'),
                            ]),

                        TextInput::make('heading')
                            ->label(__('Heading Title'))
                            ->helperText(__('HTML Allowed. Use class "tl" to highlight a word.'))
                            ->columnSpanFull()
                            ->prefixIcon('heroicon-o-pencil')
                            ->placeholder('hackable ♠')
                            ->maxLength(255)
                            ->required(),
                        RichEditor::make('content')
                            ->label(__('Subtitle / Main Content'))
                            ->helperText(__('Short description or main content.'))
                            ->columnSpanFull()
                            ->maxLength(6000),
                        Group::make()
                            ->columnSpanFull()
                            ->columns(3)
                            ->schema([
                                Group::make()
                                    ->columnSpan(2)
                                    ->schema([
                                        Checkbox::make('is_featured_image_active')
                                            ->label(__('Show Featured Image'))
                                            ->helperText(__('Show or hide the featured image.')),
                                    ]),
                                Group::make()
                                    ->columnSpan(1)
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label(__('Featured Image. (Optional)'))
                                            ->directory('content')
                                            ->multiple(false)
                                            ->helperText(__('Upload an image to display on the right side of the content.'))
                                            ->columnSpanFull(),
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

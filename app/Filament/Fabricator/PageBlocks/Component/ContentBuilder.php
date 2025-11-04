<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ContentBuilder extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.content-builder')
            ->label(__('Content Builder'))
            ->icon('heroicon-o-puzzle-piece')
            ->schema([
                Section::make(__('Content Builder'))
                    ->description(__('Create modular content sections'))
                    ->icon('heroicon-o-puzzle-piece')
                    ->schema([
                        Toggle::make('is_active')
                            ->label(__('Show Section'))
                            ->default(true),

                        TextInput::make('section_id')
                            ->label(__('Section ID'))
                            ->helperText(__('Optional: Add an ID for targeting this section')),

                        Builder::make('content_blocks')
                            ->label(__('Content Blocks'))
                            ->blocks([
                                Block::make('text')
                                    ->label(__('Text Block'))
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        RichEditor::make('content')
                                            ->label(__('Content'))
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'link',
                                                'heading',
                                                'bulletList',
                                                'orderedList',
                                                'undo',
                                                'redo',
                                            ]),
                                    ]),

                                Block::make('image')
                                    ->label(__('Image Block'))
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label(__('Image'))
                                            ->image()
                                            ->imageEditor()
                                            ->directory('images/content'),
                                        TextInput::make('alt_text')
                                            ->label(__('Alt Text'))
                                            ->helperText(__('Describe the image for accessibility')),
                                    ]),

                                Block::make('call_to_action')
                                    ->label(__('Call to Action'))
                                    ->icon('heroicon-o-megaphone')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label(__('Title'))
                                            ->required(),
                                        Textarea::make('description')
                                            ->label(__('Description')),
                                        TextInput::make('button_text')
                                            ->label(__('Button Text')),
                                        TextInput::make('button_url')
                                            ->label(__('Button URL')),
                                        Select::make('style')
                                            ->label(__('Style'))
                                            ->options([
                                                'primary'   => __('Primary'),
                                                'secondary' => __('Secondary'),
                                                'outline'   => __('Outline'),
                                            ])
                                            ->default('primary'),
                                    ]),

                                Block::make('columns')
                                    ->label(__('Columns Layout'))
                                    ->icon('heroicon-o-rectangle-group')
                                    ->schema([
                                        Select::make('columns_count')
                                            ->label(__('Number of Columns'))
                                            ->options([
                                                2 => '2 Columns',
                                                3 => '3 Columns',
                                                4 => '4 Columns',
                                            ])
                                            ->default(2),
                                        Repeater::make('columns')
                                            ->label(__('Column Content'))
                                            ->schema([
                                                RichEditor::make('content')
                                                    ->label(__('Content'))
                                                    ->toolbarButtons([
                                                        'bold',
                                                        'italic',
                                                        'link',
                                                        'bulletList',
                                                    ]),
                                            ])
                                            ->minItems(2)
                                            ->maxItems(4),
                                    ]),
                            ])
                            ->collapsible(),

                        Toggle::make('with_container')
                            ->label(__('Use Container'))
                            ->helperText(__('Wrap content in a centered container'))
                            ->default(true),

                        Select::make('spacing')
                            ->label(__('Section Spacing'))
                            ->options([
                                'sm' => __('Small'),
                                'md' => __('Medium'),
                                'lg' => __('Large'),
                            ])
                            ->default('md'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

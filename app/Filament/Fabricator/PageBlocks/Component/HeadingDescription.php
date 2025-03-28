<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
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
                                                Checkbox::make('is_heading_middle')
                                                    ->label(__('Align to Middle'))
                                                    ->helperText(__('Align the heading to the middle when Featured Image is Active.'))
                                                    ->default(true),
                                                Checkbox::make('is_heading_full_width')
                                                    ->label(__('Full Width Heading'))
                                                    ->helperText(__('Make the heading full width.'))
                                                    ->default(false),
                                                Checkbox::make('is_center')
                                                    ->label(__('Align to Center'))
                                                    ->helperText(__('Align the content to the center.'))
                                                    ->default(false),
                                                Checkbox::make('is_filled')
                                                    ->label(__('Fill Section Background'))
                                                    ->helperText(__('Fill the section background with a color.'))
                                                    ->default(false),
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
                            ->schema([
                                Group::make()
                                    ->columns(2)
                                    ->schema([
                                        Checkbox::make('is_featured_image_active')
                                            ->label(__('Show Featured Image'))
                                            ->helperText(__('Show or hide the featured image.')),
                                        FileUpload::make('featured_image')
                                            ->imageEditor()
                                            ->imageEditorAspectRatios([
                                                '16:9' => '16:9',
                                                '4:3'  => '4:3',
                                            ])
                                            ->label(__('Featured Image')),
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

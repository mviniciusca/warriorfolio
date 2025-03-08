<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Faker\Provider\ar_EG\Text;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

/**
 * @deprecated since v2.1.3 use Module Creator instead. This component still works but will be removed in future versions.
 * @see App\Filament\Fabricator\PageBlocks\Component\ModuleCreator
 */
class Module extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.module')
            ->hidden()
            ->label('Module Header')
            ->icon('heroicon-o-bars-arrow-down')
            ->schema([
                Section::make('Module Header')
                    ->description('Create a module component to be used in the page.')
                    ->icon('heroicon-o-bars-arrow-down')
                    ->collapsed()
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Show Module')
                            ->required()
                            ->inline(false)
                            ->default(true),
                        TextInput::make('module_name')
                            ->label('Module Name')
                            ->lazy()
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->columnSpan(2)
                            ->helperText('This is used to identify the module in the code. Max: 50 characters.')
                            ->required()
                            ->maxLength(50)
                            ->placeholder('Module Name'),
                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->prefix('#')
                            ->columnSpan(2)
                            ->label('Slug')
                            ->required()
                            ->helperText('Use this slug if you want to link to this module in menu.')
                            ->placeholder('generated from title'),
                        TextInput::make('title')
                            ->label('Title')
                            ->columnSpanFull()
                            ->maxLength(200)
                            ->helperText('You can use the class `tl` to highlight a text. Max: 200 characters.')
                            ->required()
                            ->placeholder('Title'),
                        TextInput::make('subtitle')
                            ->columnSpanFull()
                            ->maxLength(200)
                            ->helperText('You can use the class `tl` to highlight a text. Max: 200 characters.')
                            ->label('Subtitle (optional)')
                            ->placeholder('Subtitle'),
                        TagsInput::make('tailwind_css_attributes')
                            ->columnSpanFull()
                            ->label('Tailwind CSS Attributes (optional)')
                            ->helperText('Add Tailwind CSS attributes to style the module. Learn how Tailwind build your classes https://tailwindcss.com/docs')
                            ->placeholder('Tailwind CSS Attributes'),
                    ])->columns(5),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $data['tailwind_css_attributes'] = implode(' ', $data['tailwind_css_attributes']);

        return $data;
    }
}

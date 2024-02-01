<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeadingDescription extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.heading-description')
            ->label('Heading Description Component')
            ->icon('heroicon-o-cube')
            ->schema([
                Section::make('Component: Heading Description')
                    ->description('Add a heading description to your page.')
                    ->icon('heroicon-o-cube')
                    ->collapsed()
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->inline(false)
                            ->default(true),
                        Toggle::make('is_center')
                            ->label('Align text center')
                            ->inline(false)
                            ->default(false),
                        Select::make('heading_text_size')
                            ->label('Heading Text Size')
                            ->options([
                                'text-2xl' => '2xl',
                                'text-3xl' => '3xl',
                                'text-4xl' => '4xl',
                                'text-5xl' => '5xl',
                                'text-6xl' => '6xl',
                            ])
                            ->default('text-3xl'),
                        Select::make('content_text_size')
                            ->label('Description Text Size')
                            ->options([
                                'text-xs' => 'xs',
                                'text-sm' => 'sm',
                                'text-md' => 'text-md',
                                'text-lg' => 'lg',
                                'text-xl' => 'xl',
                                'text-2xl' => '2xl',
                            ])
                            ->default('text-base'),
                        RichEditor::make('heading')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->label('Heading')
                            ->placeholder('Enter a heading')
                            ->columnSpanFull()
                            ->helperText('Press enter to break a line! Twice to create a new paragraph. Hack: Bold a word to apply a text highlight. 😊')
                            ->required(),
                        RichEditor::make('content')
                            ->label('Description')
                            ->placeholder('Enter a description')
                            ->columnSpanFull()
                            ->helperText('Description text for the component. Press enter to break a line! Twice to create a new paragraph.')
                            ->required(),
                    ])->columns(4)
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

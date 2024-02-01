<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Slider extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.slider')
            ->label('Slider Component')
            ->icon('heroicon-o-cube')
            ->schema([
                Section::make('Component: Slider')
                    ->icon('heroicon-o-cube')
                    ->description('Display a slider of images. 5 images por view.')
                    ->schema([
                        Group::make()->schema([
                            Toggle::make('is_active')
                                ->label('Show Module')
                                ->columnSpan(1)
                                ->default(true),
                            TextInput::make('title')
                                ->label('Title (optional)')
                                ->placeholder('Enter a title')
                                ->maxLength(150)
                                ->columnSpan(2)
                                ->helperText('The title of the slider. Max: 150 characters.'),
                        ])->columns(3),
                        Section::make('Slider Content')
                            ->icon('heroicon-o-photo')
                            ->description('Display a slider of images.')
                            ->collapsible()->schema([
                                    Repeater::make('slides')
                                        ->schema([
                                            FileUpload::make('image')
                                                ->image()
                                                ->required()
                                                ->imageEditor()
                                        ])->collapsible()
                                ])
                            ->collapsed(),
                        Section::make('Slider Settings')
                            ->icon('heroicon-o-cog')
                            ->description('Customize the slider settings.')
                            ->collapsible()
                            ->schema([
                                Select::make('image_size')
                                    ->options([
                                        'h-11' => 'Default',
                                        'h-12' => 'Small',
                                        'h-13' => 'Medium',
                                        'h-14' => 'Large',
                                    ])
                                    ->default('h-11')
                                    ->label('Choose Image Size')
                                    ->placeholder('Select an image size')
                                    ->helperText('The size of the images in the slider. Default: h-11'),
                                Select::make('filter_opacity')
                                    ->label('Filter: Opacity')
                                    ->helperText('Add a opacity effect to the images. This is good if your images are too bright.')
                                    ->options([
                                        'opacity-75' => '75%',
                                        'opacity-50' => '50%',
                                        'opacity-25' => '25%',
                                    ])
                                    ->default('opacity-100'),
                                Toggle::make('image_filter')
                                    ->label('Filter: Grayscale')
                                    ->default(false)
                                    ->helperText('Convert the images to grayscale.'),
                                Toggle::make('filter_invert')
                                    ->label('Filter: Invert on Dark Mode')
                                    ->default(false)
                                    ->helperText('Invert the image when the user is in dark mode. Works well with dark images such as PNGs with transparency.'),
                            ])
                            ->collapsed()
                            ->columns(2),
                    ])->collapsed()
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

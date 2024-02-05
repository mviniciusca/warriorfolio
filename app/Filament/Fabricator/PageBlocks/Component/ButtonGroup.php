<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ButtonGroup extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.button-group')
            ->label('Button Group')
            ->icon('heroicon-o-cube')
            ->schema([
                Section::make('Component: Buttons Group')->collapsed()->description('Add a button group in your application.')->icon('heroicon-o-cube')->schema([
                    Toggle::make('is_center')->label('Group Buttons Centered')->columnSpanFull()->default(true),
                    Fieldset::make('Primary Button (optional)')->columns(3)->schema([
                        Toggle::make('is_active')->label('Show Button')->columnSpanFull()->default(true),
                        TextInput::make('button_title')->label('Button Title')->helperText('Add a primary button title'),
                        TextInput::make('button_url')->label('Button URL')->helperText('Add a URL'),
                        TextInput::make('button_icon')->label('Button Icon (optional)')->helperText('Add a Ionicon icon name')->prefix('ion-icon'),
                        Select::make('button_target')->label('Button Target')->options([
                            '_self' => 'Same Window',
                            '_blank' => 'New Window',
                        ])->default('_self'),
                        Select::make('button_size')->label('Button Size')->options([
                            'px-1 py-2' => 'Small',
                            'py-2 px-4' => 'Medium',
                            'py-3 px-5' => 'Large',
                            'py-4 px-6' => 'Extra Large',
                            'py-5 px-7' => 'Extra Extra Large',
                        ])
                            ->default('py-3 px-5')
                        ,
                    ]),
                    Fieldset::make('Secondary Button (optional)')->columns(3)->schema([
                        Toggle::make('is_active_secondary')->label('Show Button')->columnSpanFull()->default(true),
                        TextInput::make('button_title_secondary')->label('Button Title')->helperText('Add a secondary button title'),
                        TextInput::make('button_url_secondary')->label('Button URL')->helperText('Add a URL'),
                        TextInput::make('button_icon_secondary')->label('Button Icon (optional)')->helperText('Add a Ionicon icon name')->prefix('ion-icon'),
                        Select::make('button_target_secondary')->label('Button Target')->options([
                            '_self' => 'Same Window',
                            '_blank' => 'New Window',
                        ])->default('_self'),
                        Select::make('button_size_secondary')->label('Button Size')->options([
                            'px-1 py-2' => 'Small',
                            'py-2 px-4' => 'Medium',
                            'py-3 px-5' => 'Large',
                            'py-4 px-6' => 'Extra Large',
                            'py-5 px-7' => 'Extra Extra Large',
                        ])
                            ->default('py-3 px-5'),
                    ]),
                ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

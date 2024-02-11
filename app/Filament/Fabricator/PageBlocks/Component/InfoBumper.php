<?php

namespace App\Filament\Fabricator\PageBlocks\Component;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class InfoBumper extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('component.info-bumper')
            ->label('Info Bumper')
            ->icon('heroicon-o-cube')
            ->schema([
                Section::make('Component: Info Bumper')
                    ->columns(3)
                    ->description('A simple info bumper component.')
                    ->icon('heroicon-o-cube')
                    ->collapsed()
                    ->schema([
                        Group::make()->columns(3)->schema([
                            Toggle::make('is_active')->label('Active')->default(true),
                            Toggle::make('is_animated')->label('Animated')->default(true),
                            Toggle::make('is_center')->label('Align to Center')->default(false),
                        ])->columnSpanFull(),
                        TextInput::make('bumper_tag')->label('Tag')->placeholder('Tag')->required(),
                        TextInput::make('bumper_title')->label('Title')->placeholder('Title')->required(),
                        TextInput::make('bumper_icon')->label('Ionicon')->placeholder('Icon')->prefix('ion-icon'),
                        TextInput::make('bumper_link')->label('Link')->placeholder('Link'),
                        Select::make('bumper_target')->label('Target')->placeholder('Target')->options([
                            '_self' => 'Same Window',
                            '_blank' => 'New Window',
                        ])->default('_self'),
                        Select::make('bumper_role')->label('Role')->options([
                            'primary' => 'Primary',
                            'danger' => 'Danger',
                            'info' => 'Info',
                        ])->default('primary'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

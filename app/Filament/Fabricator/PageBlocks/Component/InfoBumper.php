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
            ->label(__('Bumper'))
            ->icon('heroicon-o-megaphone')
            ->schema([
                Section::make(__('Info Bumper'))
                    ->columns(3)
                    ->description(__('A simple info bumper component.'))
                    ->icon('heroicon-o-megaphone')
                    ->collapsed()
                    ->schema([
                        Group::make()
                            ->columns(3)
                            ->columnSpanFull()
                            ->schema([
                                Toggle::make('is_active')
                                    ->helperText(__('Active or Inactive.'))
                                    ->label('Active')
                                    ->default(true),
                                Toggle::make('is_animated')
                                    ->label('Animated')
                                    ->helperText(__('Animated or Static.'))
                                    ->default(true),
                                Toggle::make('is_center')
                                    ->helperText(__('Align to center.'))
                                    ->label('Align to Center')
                                    ->default(false),
                            ]),
                        TextInput::make('bumper_tag')
                            ->label(__('Tag'))
                            ->prefixIcon('heroicon-o-tag')
                            ->helperText(__('Featured Tag'))
                            ->required(),
                        TextInput::make('bumper_title')
                            ->label(__('Title'))
                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                            ->helperText(__('Main content of the bumper.'))
                            ->columnSpan(2)
                            ->required(),
                        Group::make()
                            ->columnSpanFull()
                            ->columns(2)
                            ->schema([
                                TextInput::make('bumper_icon')
                                    ->label('Ionicon')
                                    ->helperText(__('Ionicon.(Optional)'))
                                    ->suffixIcon('heroicon-o-window')
                                    ->prefix('ion-icon'),
                                TextInput::make('bumper_link')
                                    ->label('Link')
                                    ->prefixIcon('heroicon-o-link')
                                    ->helperText(__('URL Link. (Optional)')),
                                Select::make('bumper_target')
                                    ->label('Link Target')
                                    ->prefixIcon('heroicon-o-window')
                                    ->helperText(__('It opens in a new or same window.'))
                                    ->options([
                                        '_self'  => __('Self'),
                                        '_blank' => __('New'),
                                    ])
                                    ->default('_self'),
                                Select::make('bumper_role')
                                    ->label('Role')
                                    ->prefixIcon('heroicon-o-bell')
                                    ->helperText(__('Select a role of this bumper.'))
                                    ->options([
                                        'primary' => 'Primary',
                                        'danger'  => 'Danger',
                                        'info'    => 'Info',
                                    ])
                                    ->default('primary'),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}

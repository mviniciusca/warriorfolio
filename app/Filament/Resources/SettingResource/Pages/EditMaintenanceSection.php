<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditMaintenanceSection extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function getNavigationLabel(): string
    {
        return __('Maintenance Mode');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Maintenance Mode Settings');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Control when your application is under maintenance.');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Maintenance Mode'))
                    ->description(__('Define the maintenance mode of your application.'))
                    ->icon('heroicon-o-wrench-screwdriver')
                    ->relationship('maintenance')
                    ->columns(2)
                    ->schema([
                        Group::make()
                            ->columnSpanFull()
                            ->columns(2)
                            ->schema([
                                Toggle::make('is_active')
                                    ->live()
                                    ->label(__('Maintenance Mode'))
                                    ->afterStateUpdated(function (Set $set, bool $state) {
                                        return $state ? $set('is_discovery', false) : null;
                                    })
                                    ->helperText(__('Enable Maintenance Mode to disable access to your application for non-logged users. Includes you when not under a valid Auth session.')),
                                Toggle::make('is_discovery')
                                    ->live()
                                    ->label(__('Discovery Mode'))
                                    ->helperText(__('Discovery Mode allows your application visible to you based in your active Auth session while Maintenance Mode is enabled.'))
                                    ->hidden(function (Get $get): bool {
                                        return $get('is_active') ? false : true;
                                    }),
                            ]),
                        Toggle::make('is_contact')
                            ->label('Show Contact Form')
                            ->helperText('Enable contact form in maintenance mode to allow users to contact you. Note that is the same contact form of your application.')
                            ->default(false),
                        Toggle::make('is_social')
                            ->label('Social Media Links')
                            ->helperText('Enable social media in maintenance mode to allow users to follow you. Note that is the same social media of your application.')
                            ->default(false),
                    ]),
                Section::make(__('Layout & Content'))
                    ->description(__('Define the layout and content of your Maintenance Page'))
                    ->icon('heroicon-o-photo')
                    ->relationship('maintenance')
                    ->schema([
                        FileUpload::make('image')
                            ->label(__('Featured Image'))
                            ->helperText(__('Define the image of your maintenance page. Transparent background will be amazing.'))
                            ->image(),
                        RichEditor::make('content')
                            ->label(__('Content'))
                            ->columnSpanFull()
                            ->helperText(__('Define the content of your maintenance page. All content will be centralized.'))
                            ->default(__('We are currently performing maintenance. Please check back soon.'))
                            ->toolbarButtons([
                                'bold',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->maxLength(255)
                            ->required(),
                    ]),
            ]);
    }
}

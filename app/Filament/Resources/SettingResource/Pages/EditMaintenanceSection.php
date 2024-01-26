<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SettingResource;
use Faker\Core\File;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class EditMaintenanceSection extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $title = 'Maintenance Mode';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Maintenance')
                    ->description('Define the maintenance mode of your application')
                    ->icon('heroicon-o-wrench-screwdriver')
                    ->relationship('maintenance')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Maintenance Mode')
                            ->helperText('Enable maintenance mode to disable access to your application')
                            ->default(false),
                        Toggle::make('is_discovery')
                            ->label('Discovery Mode')
                            ->helperText('Enable discovery mode to allow access to your application for authorized users only. It includes your session.')
                            ->default(false),
                    ])->columns(2),
                Section::make('Layout & Content')
                    ->description('Define the layout and content of your maintenance page')
                    ->icon('heroicon-o-photo')
                    ->relationship('maintenance')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Featured Image')
                            ->helperText('Define the image of your maintenance page. Max: 2MB. Transparent background will be amazing.')
                            ->acceptedFileTypes(['image/*'])
                            ->maxSize(2000000)
                            ->image(),
                        RichEditor::make('content')
                            ->label('Content')
                            ->columnSpanFull()
                            ->helperText('Define the content of your maintenance page. Max: 255 characters. All content will be centralized.')
                            ->default('We are currently performing maintenance. Please check back soon.')
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

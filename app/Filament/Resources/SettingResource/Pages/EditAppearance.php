<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\SettingResource;

class EditAppearance extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';
    protected static ?string $title = 'Design & Appearance';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Design & Appearance')
                    ->description('Change the design and appearance of your application')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('background_image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('app')
                            ->label('Background Image')
                            ->columnSpan(3),
                        FileUpload::make('logo')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('app')
                            ->helperText('.png transparent or .svg will be nice!')
                            ->label('Logo'),
                        FileUpload::make('favicon')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('app')
                            ->helperText('.ico or .png would be amazing!')
                            ->label('Favicon'),
                    ])
                    ->columns(5),
            ]);
    }

}

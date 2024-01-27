<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\SettingResource;

class EditNewsletterSection extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';
    public static function getNavigationLabel(): string
    {
        return __('Newsletter Section');
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        Group::make([
                            Toggle::make('newsletter')
                                ->label('Show Newsletter Section')
                                ->helperText('Show or hide the newsletter section on the website.'),
                        ])->relationship('module'),
                    ]),
                Group::make()
                    ->relationship('layout')
                    ->schema([
                        Section::make('Newsletter Section')
                            ->description('You can managing your newsletter section here.')
                            ->icon('heroicon-o-envelope-open')
                            ->schema([
                                Textarea::make('newsletter_section_title')
                                    ->label('Newsletter Section Text')
                                    ->helperText('HTML allowed. Use the class text-highlight to highlight a word in the text. Max: 100 characters')
                                    ->maxLength(100),
                                Textarea::make('newsletter_section_subtitle_text')
                                    ->label('Newsletter Section Subtitle')
                                    ->helperText('you also can use the class text-highlight to highlight a word in the subtitle. Max: 100 characters')
                                    ->maxLength(100),
                                Textarea::make('newsletter_section_button_text')
                                    ->label('Newsletter Button Text')
                                    ->helperText('you also can use the class text-highlight to highlight a word in the subtitle. Max: 20 characters')
                                    ->maxLength(20),
                                FileUpload::make('newsletter_section_image')
                                    ->label('Newsletter Section Image')
                                    ->image()
                                    ->imageEditor(),
                            ])->columns(2),
                    ])->columnSpanFull(),
            ]);
    }
}

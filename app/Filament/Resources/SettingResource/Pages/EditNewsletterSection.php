<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditNewsletterSection extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    public static function getNavigationLabel(): string
    {
        return __('Newsletter Section');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Mailing List Settings');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Manager your Mailing List application.');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->relationship('module')
                    ->schema([
                        Group::make([
                            Toggle::make('newsletter')
                                ->label(__('Show Mailing List Section'))
                                ->helperText(__('Show or hide the section on the website.')),
                        ]),
                    ]),
                Group::make()
                    ->relationship('layout')
                    ->columnSpanFull()
                    ->schema([
                        Section::make(__('Mailing List Section'))
                            ->description(__('You can managing your mailing list section here.'))
                            ->icon('heroicon-o-envelope-open')
                            ->columns(2)
                            ->schema([
                                TextInput::make('mailing.section_title')
                                    ->label(__('Title'))
                                    ->placeholder(__('hackable ♠'))
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->helperText(__('HTML allowed. Use the class "tl" to highlight a word in the text. Max: 100 characters'))
                                    ->maxLength(100),
                                TextInput::make('mailing.section_subtitle')
                                    ->label(__('Subtitle'))
                                    ->placeholder(__('hackable ♠'))
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->helperText(__('HTML allowed. Use the class "tl" to highlight a word in the text. Max: 100 characters'))
                                    ->maxLength(100),
                                TextInput::make('mailing.button_text')
                                    ->label(__('Subscribe Button Text'))
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->helperText(__('HTML allowed. Use the class "tl" to highlight a word in the text. Max: 20 characters'))
                                    ->maxLength(20),
                                FileUpload::make('mailing.image')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('public/mailing')
                                    ->label(__('Section Image')),
                            ]),
                    ]),
            ]);
    }
}

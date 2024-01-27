<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;

class EditContactSection extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    public static function getNavigationLabel(): string
    {
        return __('Contact Section');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    Group::make([
                        Toggle::make('contact')
                            ->label('Show Contact Section')
                            ->helperText('Show or hide the contact section on the website.'),
                    ])->relationship('module'),
                ]),
            Section::make('Contact Section')
                ->description('This section is used to display your contact information to the public.')
                ->icon('heroicon-o-envelope')
                ->schema([
                    Group::make()->relationship('layout')->schema([
                        Toggle::make('contact_section_fill')
                            ->label('Fill Section Background')
                            ->helperText('Fill the background of this section with a secondary default color.'),
                        Textarea::make('contact_section_title')
                            ->autoFocus()
                            ->label('Contact Section Title')
                            ->columnSpanFull()
                            ->helperText('HTML allowed. Use the class text-highlight to highlight a word in the title. Max: 140 characters.')
                            ->rows(3)
                            ->maxLength(140),
                        Textarea::make('contact_section_subtitle_text')
                            ->label('Contact Section Subtitle')
                            ->columnSpanFull()
                            ->helperText('You also can use the class text-highlight to highlight a word in the subtitle. Max: 160 characters.')
                            ->rows(3)
                            ->maxLength(160),
                        TextInput::make('contact_section_phone')
                            ->label('Contact Public Phone')
                            ->tel()
                            ->helperText('Use your business phone number. This number will be visible to the public.')
                            ->maxLength(50),
                        TextInput::make('contact_section_email')
                            ->label('Public Contact E-mail')
                            ->email()
                            ->helperText('This e-mail will be visible to the public.')
                            ->maxLength(50),
                        Textarea::make('contact_section_address')
                            ->label('Contact Public Address')
                            ->helperText('Use your business address. This address will be visible to the public. Max: 300 characters.')
                            ->columnSpanFull()
                            ->rows(6)
                            ->maxLength(300),
                        Textarea::make('contact_section_google_map')
                            ->label('Google Maps Embed Code')
                            ->helperText('Paste the code between the quotes of src="" from the embed code of google maps. Do not paste the whole embed code.')
                            ->columnSpanFull()
                            ->rows(8)
                            ->maxLength(6000),
                    ])->columns(2)
                ])->collapsible(),
        ]);
    }
}

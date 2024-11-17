<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditContactSection extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function getNavigationLabel(): string
    {
        return __('Contact Section');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Contact Section');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Define your Contact section here.');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        Group::make()
                            ->relationship('module')
                            ->schema([
                                Toggle::make('contact')
                                    ->label(__('Show Contact Section'))
                                    ->helperText(__('Show or hide the contact section on the website.')),
                            ]),
                    ]),
                Section::make(__('Contact Section'))
                    ->description(__('This section is used to display your contact information to the public.'))
                    ->collapsible()
                    ->icon('heroicon-o-envelope')
                    ->schema([
                        Group::make()
                            ->columns(2)
                            ->relationship('layout')
                            ->schema([
                                Toggle::make('contact_section_fill')
                                    ->label(__('Fill Section Background'))
                                    ->helperText(__('Fill the background of this section with a secondary default color.')),
                                TextInput::make('contact_section_title')
                                    ->autoFocus()
                                    ->label(__('Contact Section Title'))
                                    ->columnSpanFull()
                                    ->helperText(__('HTML allowed. Use the class "tl" to highlight a word in the title. Max: 160 characters.'))
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->maxLength(160),
                                TextInput::make('contact_section_subtitle_text')
                                    ->label(__('Contact Section Subtitle'))
                                    ->columnSpanFull()
                                    ->helperText(__('You also can use the class "tl" to highlight a word in the subtitle. Max: 160 characters.'))
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->maxLength(160),
                                TextInput::make('contact_section_phone')
                                    ->label('Contact Public Phone')
                                    ->tel()
                                    ->prefix('+'.env('MOBILE_COUNTRY_CODE'))
                                    ->suffixIcon('heroicon-o-phone')
                                    ->helperText(__('Use your business phone number. This number will be visible to the public.'))
                                    ->maxLength(50),
                                TextInput::make('contact_section_email')
                                    ->label(__('Public Contact Email'))
                                    ->email()
                                    ->prefixIcon('heroicon-o-envelope')
                                    ->helperText(__('This email will be visible to the public.'))
                                    ->maxLength(50),
                                Textarea::make('contact_section_address')
                                    ->label(__('Contact Public Address'))
                                    ->helperText(__('Use your business address. This address will be visible to the public. Max: 300 characters.'))
                                    ->columnSpanFull()
                                    ->rows(3)
                                    ->maxLength(300),
                                Textarea::make('contact_section_google_map')
                                    ->label(__('Google Maps Embed Code'))
                                    ->helperText(__('Paste the code between the quotes of src="" from the embed code of google maps. Do not paste the whole embed code.'))
                                    ->columnSpanFull()
                                    ->rows(6)
                                    ->maxLength(6000),
                            ]),
                    ]),
            ]);
    }
}

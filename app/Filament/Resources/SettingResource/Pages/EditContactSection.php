<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\Checkbox;
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
                            ->columns(3)
                            ->relationship('layout')
                            ->schema([
                                Checkbox::make('contact.is_heading_visible')
                                    ->label(__('Show Section Heading'))
                                    ->default(true)
                                    ->helperText(__('Show or hide the section title and subtitle.')),
                                Checkbox::make('contact.section_fill')
                                    ->label(__('Fill Section Background'))
                                    ->helperText(__('Fill the background of this section with a secondary default color.')),
                                Checkbox::make('contact.is_section_filled_inverted')
                                    ->label(__('Fill Section Background Inverse'))
                                    ->helperText(__('Fill background with light color in dark mode and dark color in light mode.')),
                                TextInput::make('contact.section_title')
                                    ->autoFocus()
                                    ->label(__('Contact Section Title'))
                                    ->columnSpanFull()
                                    ->placeholder(__('hackable ♠'))
                                    ->helperText(__('HTML allowed. Use the class "tl" to highlight a word in the title. Max: 160 characters.'))
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->maxLength(160),
                                TextInput::make('contact.section_subtitle')
                                    ->label(__('Contact Section Subtitle'))
                                    ->columnSpanFull()
                                    ->placeholder(__('hackable ♠'))
                                    ->helperText(__('You also can use the class "tl" to highlight a word in the subtitle. Max: 160 characters.'))
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->maxLength(160),
                                TextInput::make('contact.public_phone')
                                    ->label('Phone Number (Public Information)(Optional)')
                                    ->tel()
                                    ->prefix('+'.env('MOBILE_COUNTRY_CODE'))
                                    ->suffixIcon('heroicon-o-phone')
                                    ->helperText(__('Use your business phone number. Optional.'))
                                    ->maxLength(50),
                                TextInput::make('contact.public_email')
                                    ->label(__('Email (Public Information)(Optional)'))
                                    ->email()
                                    ->prefixIcon('heroicon-o-envelope')
                                    ->helperText(__('Use your business email address. Optional.'))
                                    ->maxLength(50),
                                TextInput::make('contact.public_address')
                                    ->label(__('Address (Public Information)(Optional)'))
                                    ->helperText(__('Use your business address. Optional.'))
                                    ->columnSpanFull()
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->maxLength(255),
                                Textarea::make('contact.google_maps_code')
                                    ->label(__('Google Maps Embed Code (Optional)'))
                                    ->helperText(__('💡 Paste the code between the quotes of src="" from the embed code of google maps. Do not paste the whole embed code.'))
                                    ->columnSpanFull()
                                    ->placeholder(__('Starts with https://www.google.com/maps ... '))
                                    ->rows(4)
                                    ->maxLength(4000),
                            ]),
                    ]),
            ]);
    }
}

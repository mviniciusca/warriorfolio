<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditSections extends EditRecord
{
    protected static string $resource = SettingResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Sections')
                    ->tabs([
                        Tabs\Tab::make('Contact')
                            ->icon('heroicon-o-envelope')
                            ->schema([
                                Section::make('Contact Section Settings')
                                    ->description('Configure your contact section settings')
                                    ->schema([
                                        // Contact section fields from EditContactSection
                                        Toggle::make('module.contact')
                                            ->label('Show Contact Section')
                                            ->helperText('Show or hide the contact section on the website'),
                                        TextInput::make('layout.contact.section_title')
                                            ->label('Section Title')
                                            ->helperText('HTML allowed. Use class "tl" to highlight words'),
                                        TextInput::make('layout.contact.section_subtitle')
                                            ->label('Section Subtitle'),
                                        TextInput::make('layout.contact.public_email')
                                            ->label('Public Email')
                                            ->email(),
                                        TextInput::make('layout.contact.public_phone')
                                            ->label('Public Phone'),
                                        TextInput::make('layout.contact.public_address')
                                            ->label('Public Address'),
                                    ]),
                            ]),

                        Tabs\Tab::make('Portfolio')
                            ->icon('heroicon-o-rocket-launch')
                            ->schema([
                                Section::make('Portfolio Section Settings')
                                    ->description('Configure your portfolio section settings')
                                    ->schema([
                                        Toggle::make('module.portfolio')
                                            ->label('Show Portfolio Section')
                                            ->helperText('Show or hide the portfolio section'),
                                        TextInput::make('layout.portfolio.section_title')
                                            ->label('Section Title')
                                            ->helperText('HTML allowed. Use class "tl" to highlight words'),
                                        TextInput::make('layout.portfolio.section_subtitle')
                                            ->label('Section Subtitle'),
                                    ]),
                            ]),

                        Tabs\Tab::make('About')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Section::make('About Section Settings')
                                    ->description('Configure your about section settings')
                                    ->schema([
                                        Toggle::make('module.about')
                                            ->label('Show About Section')
                                            ->helperText('Show or hide the about section'),
                                        TextInput::make('layout.about.section_title')
                                            ->label('Section Title')
                                            ->helperText('HTML allowed. Use class "tl" to highlight words'),
                                        TextInput::make('layout.about.section_subtitle')
                                            ->label('Section Subtitle'),
                                    ]),
                            ]),

                        Tabs\Tab::make('Customers')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Section::make('Customer Section Settings')
                                    ->description('Configure your customer section settings')
                                    ->schema([
                                        Toggle::make('module.clients')
                                            ->label('Show Customer Section')
                                            ->helperText('Show or hide the customer section'),
                                        TextInput::make('layout.customer.section_title')
                                            ->label('Section Title')
                                            ->helperText('HTML allowed. Use class "tl" to highlight words'),
                                        TextInput::make('layout.customer.section_subtitle')
                                            ->label('Section Subtitle'),
                                    ]),
                            ]),

                        Tabs\Tab::make('Footer')
                            ->icon('heroicon-o-bolt')
                            ->schema([
                                Section::make('Footer Section Settings')
                                    ->description('Configure your footer section settings')
                                    ->schema([
                                        Toggle::make('module.footer')
                                            ->label('Show Footer Section')
                                            ->helperText('Show or hide the footer section'),
                                        Toggle::make('layout.footer.section_fill')
                                            ->label('Fill Section Background')
                                            ->helperText('Fill the background with a secondary color'),
                                    ]),
                            ]),

                        Tabs\Tab::make('Newsletter')
                            ->icon('heroicon-o-envelope-open')
                            ->schema([
                                Section::make('Newsletter Section Settings')
                                    ->description('Configure your newsletter section settings')
                                    ->schema([
                                        Toggle::make('module.newsletter')
                                            ->label('Show Newsletter Section')
                                            ->helperText('Show or hide the newsletter section'),
                                        TextInput::make('layout.mailing.section_title')
                                            ->label('Section Title')
                                            ->helperText('HTML allowed. Use class "tl" to highlight words'),
                                        TextInput::make('layout.mailing.section_subtitle')
                                            ->label('Section Subtitle'),
                                        TextInput::make('layout.mailing.button_text')
                                            ->label('Button Text')
                                            ->maxLength(20),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}

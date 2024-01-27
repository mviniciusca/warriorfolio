<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class EditChatbox extends EditRecord
{
    protected static string $resource = SettingResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-phone';
    public static function getNavigationLabel(): string
    {
        return __('Whatsapp Chatbox');
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Whatsapp Chatbox')
                    ->relationship('chatbox', 'id')
                    ->description('This section is for the whatsapp chatbox.')
                    ->icon('heroicon-o-phone')
                    ->schema([
                        Toggle::make('visible')
                            ->default(false)
                            ->columnSpanFull()
                            ->helperText('If the chatbox bubble is visible or not')
                            ->inline()
                            ->required()
                            ->label('Visible'),
                        TextInput::make('telephone')
                            ->label('Whatsapp Number')
                            ->numeric()
                            ->required()
                            ->helperText('Your whatsapp telephone number. Just Numbers. Don\'t forget to add the country code.')
                            ->placeholder('Telephone'),
                        TextInput::make('message')
                            ->label('Message')
                            ->required()
                            ->helperText('This message will be displayed in the whatsapp chatbox. You will receive it in your whatsapp. It\'s like a person is sending you a first contact message.')
                            ->placeholder('Message'),
                        ColorPicker::make('color')
                            ->required()
                            ->helperText('I know that whatsapp is green 😂 #25D366 is the hex code'),
                        TextInput::make('icon')
                            ->label('Ionicon Name')
                            ->required()
                            ->helperText('You cant find the name of the icon in ionic.io/ionicons'),
                        Select::make('animation_style')
                            ->required()
                            ->options([
                                'animate-none' => 'None',
                                'animate-bounce' => 'Bounce',
                                'animate-ping' => 'Ping',
                                'animate-pulse' => 'Pulse',
                                'animate-spin' => 'Spin',
                            ])
                            ->helperText('Following the Tailwind CSS documentation')
                            ->label('Animation Style'),
                    ])
                    ->columns(2)
            ]);
    }
}

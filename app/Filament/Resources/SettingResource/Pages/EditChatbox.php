<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditChatbox extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    public static function getNavigationLabel(): string
    {
        return __('Whatsapp Chatbox');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Whatsapp Chatbox');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Configure your Whatsapp account to use this chat.');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Whatsapp Chatbox')
                    ->relationship('chatbox')
                    ->description('This section is for the whatsapp chatbox.')
                    ->icon('heroicon-o-phone')
                    ->schema([
                        Toggle::make('visible')
                            ->default(false)
                            ->columnSpanFull()
                            ->helperText(__('If the chatbox bubble is visible or not'))
                            ->inline()
                            ->required()
                            ->label(__('Active')),
                        TextInput::make('telephone')
                            ->prefix('+'.config('warriorfolio.mobile_country_code', '55'))
                            ->label(__('Whatsapp Number'))
                            ->helperText(__('Your whatsapp telephone number. Just Numbers.'))
                            ->placeholder(__('Mobile Number'))
                            ->suffixIcon('heroicon-o-phone')
                            ->numeric()
                            ->tel()
                            ->maxLength(100)
                            ->required(),
                        Select::make('animation_style')
                            ->prefixIcon('heroicon-o-bolt')
                            ->required()
                            ->options([
                                'animate-none'   => 'None',
                                'animate-bounce' => 'Bounce',
                                'animate-ping'   => 'Ping',
                                'animate-pulse'  => 'Pulse',
                                'animate-spin'   => 'Spin',
                            ])
                            ->helperText(__('Following the Tailwind CSS documentation'))
                            ->label(__('Animation Style')),
                        ColorPicker::make('color')
                            ->prefixIcon('heroicon-o-paint-brush')
                            ->placeholder('#25D366')
                            ->helperText(__('#25D366 is the hex code for the whatsapp green color')),
                        TextInput::make('icon')
                            ->label('Ionicon Name')
                            ->prefix('ion-icon')
                            ->placeholder('icon-whatsapp')
                            ->required()
                            ->helperText(__('You cant find the name of the icon in ionic.io/ionicons')),
                        TextInput::make('message')
                            ->label(__('Welcome Message'))
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(200)
                            ->prefixIcon('heroicon-o-chat-bubble-oval-left')
                            ->helperText(__('You will receive it in your whatsapp. Max.: 200 characters'))
                            ->placeholder(__('Hi, I wanna get in touch with you!')),

                    ])
                    ->columns(2),
            ]);
    }
}

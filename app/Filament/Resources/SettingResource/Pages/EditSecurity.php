<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Group;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SettingResource;
use Filament\Forms\Components\TextInput;

class EditSecurity extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';
    public static function getNavigationLabel(): string
    {
        return __('Account Security Manager');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Change Password')
                ->relationship('user')
                ->description('This section is used to manage your account password.')
                ->icon('heroicon-o-lock-closed')
                ->schema([
                    TextInput::make('password')
                        ->password()
                        ->confirmed()
                        ->regex('/^\S+$/')
                        ->validationMessages([
                            'confirmed' => 'The password confirmation does not match.',
                            'regex' => 'The password must not contain any whitespace.',
                        ])
                        ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                        ->dehydrated(fn(?string $state): bool => filled($state))
                        ->label('Password')
                        ->minLength(6)
                        ->maxLength(15)
                        ->revealable()
                        ->helperText('Password must be at least 6 characters long and no more than 15 characters long.'),
                    TextInput::make('password_confirmation')
                        ->password()
                        ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                        ->dehydrated(fn(?string $state): bool => filled($state))
                        ->label('Confirm Password')
                        ->revealable()
                        ->helperText('Please confirm your password.')
                        ->minLength(6)
                        ->maxLength(15),
                ])->columns(2)
        ]);
    }
}

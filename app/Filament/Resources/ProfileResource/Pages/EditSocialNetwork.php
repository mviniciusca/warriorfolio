<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditSocialNetwork extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    public static function getNavigationLabel(): string
    {
        return __('Social Network');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make(__('Social Network'))
                ->description(__('These links will be displayed on your profile page.'))
                ->icon('heroicon-o-link')
                ->schema([
                    Repeater::make('social')
                        ->cloneable()
                        ->itemLabel(function (array $state): string {
                            $title = $state['social_network'] ?? __('Card');

                            return preg_replace('/<.*?>.*?<\/.*?>/', '', ucfirst($title));
                        })
                        ->reorderable()
                        ->columns(6)
                        ->schema([
                            Toggle::make('is_active')
                                ->label(__('Active'))
                                ->inline(false)
                                ->default(true),
                            Select::make('social_network')
                                ->columnSpan(2)
                                ->live()
                                ->required()
                                ->helperText(__('Social Network'))
                                ->prefixIcon('heroicon-o-user')
                                ->options([
                                    'behance'       => 'Behance',
                                    'codepen'       => 'Codepen',
                                    'discord'       => 'Discord',
                                    'dribbble'      => 'Dribbble',
                                    'facebook'      => 'Facebook',
                                    'github'        => 'Github',
                                    'instagram'     => 'Instagram',
                                    'linkedin'      => 'Linkedin',
                                    'medium'        => 'Medium',
                                    'npm'           => 'NPM',
                                    'stackoverflow' => 'Stackoverflow',
                                    'tiktok'        => 'Tiktok',
                                    'twitch'        => 'Twitch',
                                    'twitter'       => 'X / Twitter',
                                    'vercel'        => 'Vercel',
                                    'whatsapp'      => 'Whatsapp',
                                    'youtube'       => 'Youtube',
                                ])
                                ->label(__('Social Network')),
                            TextInput::make('profile_link')
                                ->prefix('https://')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(3)
                                ->helperText(__('facebook.com/my-profile'))
                                ->prefixIcon('heroicon-o-link')
                                ->label(__('Profile Link')),
                        ]),
                ]),
        ]);
    }
}

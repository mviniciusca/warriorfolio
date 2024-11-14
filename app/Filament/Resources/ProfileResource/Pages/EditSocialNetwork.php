<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Actions;
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
                        ->columns(6)
                        ->schema([
                            Toggle::make('is_active')
                                ->label(__('Active'))
                                ->inline(false)
                                ->default(true),
                            Select::make('social_network')
                                ->columnSpan(2)
                                ->helperText(__('Social Network'))
                                ->prefixIcon('heroicon-o-user')
                                ->options([
                                    'linkedin'      => 'Linkedin',
                                    'discord'       => 'Discord',
                                    'twitter'       => 'Twitter',
                                    'instagram'     => 'Instagram',
                                    'facebbook'     => 'Facebook',
                                    'dribbble'      => 'Dribbble',
                                    'youtube'       => 'Youtube',
                                    'vercel'        => 'Vercel',
                                    'github'        => 'Github',
                                    'tiktok'        => 'Tiktok',
                                    'stackoverflow' => 'Stackoverflow',
                                ])
                                ->label(__('Social Network')),
                            TextInput::make('profile_link')
                                ->columnSpan(3)
                                ->helperText(__('Social Network Profile Link'))
                                ->prefixIcon('heroicon-o-link')
                                ->label(__('Profile Link')),
                        ]),
                ]),
        ]);
    }
}

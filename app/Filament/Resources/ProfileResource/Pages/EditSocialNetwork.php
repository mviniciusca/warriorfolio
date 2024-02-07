<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProfileResource;
use Filament\Forms\Components\TextInput;

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
            Section::make('Social Network Links')
                ->description('These links will be displayed on your profile page. You can leave the fields empty if you don\'t want to display them.')
                ->icon('heroicon-o-link')
                ->columns(2)
                ->schema([
                    TextInput::make('github')
                        ->label('GitHub')
                        ->prefixIcon('heroicon-o-link')
                        ->helperText('Your GitHub link username')
                        ->prefix('https://')
                        ->maxLength(255)
                        ->placeholder('github link'),
                    TextInput::make('twitter')
                        ->label('X / Twitter')
                        ->prefixIcon('heroicon-o-link')
                        ->helperText('Your X / Twitter link username')
                        ->prefix('https://')
                        ->maxLength(255)
                        ->placeholder('x / twitter link'),
                    TextInput::make('linkedin')
                        ->label('LinkedIn')
                        ->prefixIcon('heroicon-o-link')
                        ->helperText('Your LinkedIn link username')
                        ->prefix('https://')
                        ->maxLength(255)
                        ->placeholder('linkedin link'),
                    TextInput::make('facebook')
                        ->label('Facebook')
                        ->prefixIcon('heroicon-o-link')
                        ->helperText('Your Facebook link username')
                        ->prefix('https://')
                        ->maxLength(255)
                        ->placeholder('facebook link'),
                    TextInput::make('instagram')
                        ->label('Instagram')
                        ->prefixIcon('heroicon-o-link')
                        ->helperText('Your Instagram link username')
                        ->prefix('https://')
                        ->maxLength(255)
                        ->placeholder('instagram link'),
                    TextInput::make('youtube')
                        ->label('YouTube')
                        ->prefixIcon('heroicon-o-link')
                        ->helperText('Your YouTube link username')
                        ->prefix('https://')
                        ->maxLength(255)
                        ->placeholder('youtube link'),
                    TextInput::make('twitch')
                        ->label('Twitch')
                        ->prefixIcon('heroicon-o-link')
                        ->helperText('Your Twitch link username')
                        ->prefix('https://')
                        ->maxLength(255)
                        ->placeholder('twitch link'),
                    TextInput::make('devto')
                        ->label('Dev.to')
                        ->prefixIcon('heroicon-o-link')
                        ->helperText('Your Dev.to link username')
                        ->prefix('https://')
                        ->maxLength(255)
                        ->placeholder('dev.to link'),
                    TextInput::make('dribbble')
                        ->label('Dribbble')
                        ->prefixIcon('heroicon-o-link')
                        ->helperText('Your Dribbble link username')
                        ->prefix('https://')
                        ->maxLength(255)
                        ->placeholder('dribbble link'),
                    TextInput::make('medium')
                        ->label('Medium')
                        ->prefixIcon('heroicon-o-link')
                        ->helperText('Your Medium link username')
                        ->prefix('https://')
                        ->maxLength(255)
                        ->placeholder('medium link'),
                ])
        ]);
    }
}

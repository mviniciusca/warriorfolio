<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditBlogSettings extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    public static function getNavigationLabel(): string
    {
        return __('Blog Settings');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Blog Settings');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Manager your Blog Settings.');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Blog Settings'))
                    ->description(__('Manage your Blog Settings and Public Definitions.'))
                    ->icon('heroicon-o-pencil')
                    ->columns(2)
                    ->schema([
                        Toggle::make('blog.is_active')
                            ->default(true)
                            ->helperText(__('Show Blog name and description'))
                            ->label(__('Show Info')),
                        TextInput::make('blog.name')
                            ->maxLength(255)
                            ->placeholder(__('hackable ♠'))
                            ->prefixIcon('heroicon-o-pencil')
                            ->helperText(__('Blog Name'))
                            ->columnSpanFull()
                            ->label(__('Blog Name')),
                        TextInput::make('blog.description')
                            ->maxLength(255)
                            ->placeholder(__('hackable ♠'))
                            ->prefixIcon('heroicon-o-pencil')
                            ->helperText(__('Blog Description'))
                            ->columnSpanFull()
                            ->label(__('Blog Short Description')),
                    ]),
            ]);
    }
}

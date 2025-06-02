<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Tabs;
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
        return __('Notes Section');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Notes Section');
    }

    public function getSubheading(): string | Htmlable | null
    {
        return __('Manage your Blog Settings.');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Settings')
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('General')
                            ->icon('heroicon-o-cog')
                            ->schema([
                                Toggle::make('blog.module_is_active')
                                    ->default(true)
                                    ->helperText(__('To hide your blog system completely, you can disable the module in Application Settings > Core Modules Global Visibility Control '))
                                    ->label(__('Show Featured Posts from Notes Module')),
                            ]),

                        Tabs\Tab::make('Articles Section')
                            ->icon('heroicon-o-book-open')
                            ->schema([
                                Group::make()
                                    ->columns(2)
                                    ->extraAttributes([
                                        'class'       => 'space-y-4',
                                        'description' => __('This module shows your latest posts in your Post Page. All fields are optional.'),
                                    ])
                                    ->schema([
                                        TextInput::make('blog.more_articles_title')
                                            ->label(__('More Articles Title'))
                                            ->placeholder(__('hackable ♠'))
                                            ->prefixIcon('heroicon-o-pencil')
                                            ->default(__('Latest Stories'))
                                            ->helperText(__('HTML allowed. Use the class "tl" to highlight a word')),
                                        TextInput::make('blog.more_articles_btn_title')
                                            ->label(__('More Articles Button Title'))
                                            ->placeholder(__('hackable ♠'))
                                            ->prefixIcon('heroicon-o-pencil')
                                            ->default(__('More Stories'))
                                            ->helperText(__('HTML allowed. Use the class "tl" to highlight a word')),

                                    ]),
                            ]),

                        Tabs\Tab::make('Featured Posts')
                            ->icon('heroicon-o-pencil')
                            ->schema([
                                Group::make()
                                    ->extraAttributes([
                                        'class'       => 'space-y-4',
                                        'description' => __('This module shows your latest posts from your Notes. All fields are optional.'),
                                    ])
                                    ->columns(2)
                                    ->schema([
                                        Checkbox::make('blog.is_heading_visible')
                                            ->columnSpanFull()
                                            ->label(__('Show Section Heading'))
                                            ->default(true)
                                            ->helperText(__('Show or hide the section title and subtitle.')),
                                        TextInput::make('blog.header_title')
                                            ->label(__('Title'))
                                            ->placeholder(__('hackable ♠'))
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->helperText(__('HTML allowed. Use the class "tl" to highlight a word')),
                                        TextInput::make('blog.header_subtitle')
                                            ->placeholder(__('hackable ♠'))
                                            ->label(__('Subtitle'))
                                            ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                            ->helperText(__('HTML allowed. Use the class "tl" to highlight a word')),
                                        TextInput::make('blog.button')
                                            ->label(__('Button Title'))
                                            ->prefixIcon('heroicon-o-cube')
                                            ->helperText(__('Define the Header Button Title')),
                                        TextInput::make('blog.button_url')
                                            ->prefixIcon('heroicon-o-link')
                                            ->label(__('URL'))
                                            ->helperText(__('Define the Header Button URL')),
                                    ]),
                            ]),

                        Tabs\Tab::make('Features')
                            ->icon('heroicon-o-bolt')
                            ->schema([
                                Group::make()
                                    ->extraAttributes([
                                        'class'       => 'space-y-4',
                                        'description' => __('Manage your Notes Pages Settings'),
                                    ])
                                    ->columns(3)
                                    ->schema([
                                        Checkbox::make('blog.is_show_profile')
                                            ->default(true)
                                            ->label(__('Show Profile'))
                                            ->helperText(__('Show or hide the profile section.')),
                                        Checkbox::make('blog.is_share_active')
                                            ->default(true)
                                            ->label(__('Share Feature'))
                                            ->helperText(__('Enable or disable the share feature.')),
                                        Checkbox::make('blog.is_trend_widget_active')
                                            ->default(true)
                                            ->label(__('Trend Widget Feature'))
                                            ->helperText(__('Enable or disable the trend widget feature.')),
                                    ]),
                            ]),

                        Tabs\Tab::make('Header')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Group::make()
                                    ->extraAttributes([
                                        'class'       => 'space-y-4',
                                        'description' => __('Manage your Notes Settings and Public Definitions.'),
                                    ])
                                    ->columns(3)
                                    ->schema([
                                        Group::make()
                                            ->columnSpan(2)
                                            ->schema([
                                                Toggle::make('blog.is_active')
                                                    ->default(true)
                                                    ->helperText(__('Show Blog Header'))
                                                    ->label(__('Show Header')),
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
                                        Group::make()
                                            ->schema([
                                                Toggle::make('blog.is_logo_active')
                                                    ->default(true)
                                                    ->helperText(__('Show Blog Logo'))
                                                    ->label(__('Show Logo')),
                                                CuratorPicker::make('blog.logo')
                                                    ->label(__('Blog Logo')),
                                                Checkbox::make('blog.is_invert_logo')
                                                    ->default(false)
                                                    ->helperText(__('Invert the logo color when dark mode is active.'))
                                                    ->label(__('Invert Logo Color')),
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}

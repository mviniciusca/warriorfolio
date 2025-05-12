<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideshowResource\Pages;
use App\Filament\Resources\SlideshowResource\RelationManagers;
use App\Models\Slideshow;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class SlideshowResource extends Resource
{
    protected static ?string $model = Slideshow::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?int $navigationSort = 3;

    public static function getNavigationLabel(): string
    {
        return __('Sliders');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Website Design');
    }

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::where('is_active', true)->count() > 0) {
            return static::getModel()::where('is_active', true)->count();
        }

        return null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->columnSpanFull()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->autofocus()
                            ->columnSpan(2)
                            ->helperText('The title of the slideshow')
                            ->maxLength(255),
                        Select::make('module_name')
                            ->options([
                                'hero-section'    => 'Hero Section',
                                'about-section'   => 'About Section',
                                'clients-section' => 'Clients Section',
                            ])
                            ->default('hero-section')
                            ->searchDebounce(500)
                            ->searchable()
                            ->label('Core Module')
                            ->helperText('The module where the slideshow will be displayed. Not all core modules support slideshows.')
                            ->columnSpan(2)
                            ->required(),
                        Toggle::make('is_active')
                            ->inline(false)
                            ->helperText(__('Enable this slideshow'))
                            ->label('Show Slideshow')
                            ->default(true),
                    ])
                    ->columns(5),

                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Images')
                        ->icon('heroicon-o-camera')
                        ->description('Upload and manage slider images')
                        ->schema([
                            Repeater::make('content')
                                ->cloneable()
                                ->label('Slider Content')
                                ->defaultItems(1)
                                ->schema([
                                    Forms\Components\FileUpload::make('image_path')
                                        ->label('Image')
                                        ->image()
                                        ->imageEditor()
                                        ->columnSpanFull()
                                        ->directory('public/slideshow')
                                        ->required(),
                                    Group::make()
                                        ->columns(3)
                                        ->schema([
                                            Forms\Components\TextInput::make('image_title')
                                                ->reactive()
                                                ->lazy()
                                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('image_alt', Str::slug($state)))
                                                ->label('Image Title')
                                                ->helperText('The title of the image (optional)')
                                                ->maxLength(255),
                                            Forms\Components\TextInput::make('image_url')
                                                ->maxLength(255)
                                                ->helperText('The URL where the image will link to (optional)')
                                                ->label('Link'),
                                            Forms\Components\TextInput::make('image_alt')
                                                ->disabled()
                                                ->dehydrated()
                                                ->placeholder('Auto-generated from Image Title')
                                                ->label('Image Alt')
                                                ->maxLength(255),
                                        ]),
                                ])
                                ->reorderable()
                                ->collapsible(),
                        ]),

                    Forms\Components\Wizard\Step::make('Settings')
                        ->icon('heroicon-o-cog-6-tooth')
                        ->description('Configure slideshow options')
                        ->schema([
                            Group::make()
                                ->columnSpanFull()
                                ->columns(4)
                                ->schema([
                                    Toggle::make('show_title')
                                        ->inline(false)
                                        ->label('Show Title')
                                        ->helperText(__('Show the title of the image'))
                                        ->default(true),
                                    Toggle::make('is_invert')
                                        ->inline(false)
                                        ->helperText('Invert the colors of the images. This is useful if the png image is dark so turn white in dark mode.')
                                        ->label('Filter: Invert Colors')
                                        ->default(false),
                                    Select::make('slider_size')
                                        ->options([
                                            'max-w-3xl' => 'Small (max-w-3xl)',
                                            'max-w-4xl' => 'Medium (max-w-4xl)',
                                            'max-w-5xl' => 'Large (max-w-5xl)',
                                            'max-w-6xl' => 'Extra Large (max-w-6xl)',
                                            'max-w-7xl' => 'Full Width (max-w-7xl)',
                                        ])
                                        ->default('max-w-5xl'),
                                    Select::make('image_size')
                                        ->options([
                                            'small'       => 'Small (h-10)',
                                            'default'     => 'Default (h-12)',
                                            'medium'      => 'Medium (h-14)',
                                            'large'       => 'Large (h-16)',
                                            'extra-large' => 'Extra Large (h-20)',
                                        ])
                                        ->default('default'),
                                ]),

                        ]),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title'),
                Tables\Columns\TextColumn::make('module_name')
                    ->label('Module'),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSlideshows::route('/'),
            'create' => Pages\CreateSlideshow::route('/create'),
            'edit'   => Pages\EditSlideshow::route('/{record}/edit'),
        ];
    }
}

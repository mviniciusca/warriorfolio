<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Slideshow;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SlideshowResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SlideshowResource\RelationManagers;

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
        return __('Core Features');
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
                Group::make()->schema([
                    Section::make('Options')
                        ->icon('heroicon-o-cog-6-tooth')
                        ->description('Set the options for the slideshow.')
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->autofocus()
                                ->helperText('The title of the slideshow')
                                ->columnSpanFull()
                                ->maxLength(255),
                            Forms\Components\Select::make('module_name')
                                ->options([
                                    'hero-section' => 'Hero Section',
                                    'about-section' => 'About Section',
                                    'clients-section' => 'Clients Section',
                                ])
                                ->default('hero-section')
                                ->searchDebounce(500)
                                ->searchable()
                                ->label('Core Module')
                                ->helperText('The module where the slideshow will be displayed. Not all core modules support slideshows.')
                                ->columnSpanFull()
                                ->required(),
                            Forms\Components\Toggle::make('show_title')
                                ->inline(false)
                                ->label('Show Title')
                                ->default(true),
                            Forms\Components\Toggle::make('is_active')
                                ->inline(false)
                                ->label('Show Slideshow')
                                ->default(true),
                        ])->columns(2)->collapsible(),
                    Section::make('Design')
                        ->columns(1)
                        ->description('Design options')
                        ->icon('heroicon-o-paint-brush')
                        ->schema([
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
                                    'small' => 'Small (h-10)',
                                    'default' => 'Default (h-12)',
                                    'medium' => 'Medium (h-14)',
                                    'large' => 'Large (h-16)',
                                    'extra-large' => 'Extra Large (h-20)',
                                ])
                                ->default('default'),
                            Toggle::make('is_invert')
                                ->inline(false)
                                ->helperText('Invert the colors of the images. This is useful if the png image is dark so turn white in dark mode.')
                                ->label('Filter: Invert Colors')
                                ->default(false),
                        ])->collapsible(),
                ])->columnSpan(2),
                Section::make('Slider')
                    ->description('💡Tip: Images with the same size will look better.')
                    ->icon('heroicon-o-camera')
                    ->schema([
                        Repeater::make('content')
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
                                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('image_alt', Str::slug($state)))
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
                            ->collapsible()
                    ])->columnSpan(4),
            ])->columns(6);
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
            'index' => Pages\ListSlideshows::route('/'),
            'create' => Pages\CreateSlideshow::route('/create'),
            'edit' => Pages\EditSlideshow::route('/{record}/edit'),
        ];
    }
}

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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Options')->icon('heroicon-o-cog')->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('module_name')
                            ->options([
                                'about-section' => 'About Section',
                                'contact-section' => 'Contact Section',
                                'footer-section' => 'Footer Section',
                                'hero-section' => 'Hero Section',
                                'home-default' => 'Homepage',
                                'portfolio-section' => 'Portfolio Section',
                            ])
                            ->default('hero-section')
                            ->searchDebounce(500)
                            ->searchable()
                            ->required(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Visible')
                            ->default(true)
                            ->required(),
                    ])
                ])->columnSpan(2),
                Section::make('Slideshow')
                    ->icon('heroicon-o-camera')
                    ->schema([
                        Repeater::make('content')
                            ->label('Slides')
                            ->defaultItems(1)
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->label('Image')
                                    ->image()
                                    ->directory('slideshow')
                                    ->required(),
                                Group::make()->schema([
                                    Forms\Components\TextInput::make('image_title')
                                        ->label('Image Title')
                                        ->reactive()
                                        ->lazy()
                                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('image_alt', Str::slug($state))),
                                    Forms\Components\TextInput::make('image_alt')
                                        ->label('Image Alt')
                                        ->disabled()
                                        ->dehydrated(),
                                    Forms\Components\TextInput::make('image_url')
                                        ->label('Link'),
                                ]),
                            ])->columns(2)
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
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
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

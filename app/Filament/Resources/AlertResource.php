<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlertResource\Pages;
use App\Models\Alert;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
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

class AlertResource extends Resource
{
    protected static ?string $model = Alert::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    public static function getNavigationLabel(): string
    {
        return __('Website Alerts');
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

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('Alert Information'))
                    ->description(__('Manager your website alerts.'))
                    ->columns(4)
                    ->icon('heroicon-o-bell')
                    ->schema([
                        Group::make()
                            ->columns(3)
                            ->columnSpanFull()
                            ->schema([
                                Toggle::make('is_active')
                                    ->label(__('Active'))
                                    ->default(true)
                                    ->helperText(__('Active or inactive this alert.'))
                                    ->required(),
                                Toggle::make('is_dismissible')
                                    ->label(__('Dismissible'))
                                    ->default(true)
                                    ->helperText(__('Enable or disable the ability to dismiss the alert. A cookie will be set to remember the user\'s preference.'))
                                    ->required(),
                                Select::make('style')
                                    ->prefixIcon('heroicon-o-tag')
                                    ->label(__('Alert Style'))
                                    ->options([
                                        'default' => 'Default',
                                        'bumper'  => 'Bumper',
                                        'banner'  => 'Banner',
                                        'toast'   => 'Toast',
                                        'modal'   => 'Modal',
                                    ])
                                    ->helperText(__('Select the style of the alert.'))
                                    ->default('default')
                                    ->required(),
                            ]),
                        Group::make()
                            ->schema([
                                TextInput::make('title')
                                    ->live(true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('title', Str::slug($state)))
                                    ->required()
                                    ->label(__('Title Tag'))
                                    ->prefixIcon('heroicon-o-tag')
                                    ->helperText(__('The tag title of the alert. This is useful to remember what the alert is for. Max: 140 characters.'))
                                    ->maxLength(140),
                                TextInput::make('button_text')
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->default(__('Close'))
                                    ->label(__('Button Text'))
                                    ->helperText(__('The text to display on the button. Max: 50 characters. Default is "Close". Leave empty for a close icon.'))
                                    ->maxLength(50),
                            ]),
                        RichEditor::make('message')
                            ->required()
                            ->columnSpan(3)
                            ->helperText(__('The message to display in the alert. Max: 2500 characters.'))
                            ->maxLength(3000),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('style')
                    ->label('Style')
                    ->badge()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active')
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\ToggleColumn::make('is_dismissible')
                    ->label('Dismissible')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index'  => Pages\ListAlerts::route('/'),
            'create' => Pages\CreateAlert::route('/create'),
            'edit'   => Pages\EditAlert::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Alert;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AlertResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AlertResource\RelationManagers;
use Filament\Tables\Actions\ActionGroup;

class AlertResource extends Resource
{
    protected static ?string $model = Alert::class;
    protected static ?string $navigationIcon = 'heroicon-o-bell';
    public static function getNavigationLabel(): string
    {
        return __('Alerts');
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
                Section::make('Alert Information')
                    ->description('Add a new alert to the system.')
                    ->columns(4)
                    ->icon('heroicon-o-bell')
                    ->schema([
                        Group::make()->columns(3)->columnSpanFull()->schema([
                            Forms\Components\Toggle::make('is_active')
                                ->label('Active')
                                ->default(true)
                                ->helperText('Active or inactive alerts will be displayed on the front-end.')
                                ->required(),
                            Forms\Components\Toggle::make('is_dismissible')
                                ->label('Dismissible')
                                ->default(true)
                                ->helperText('Enable or disable the ability to dismiss the alert. A cookie will be set to remember the user\'s preference.')
                                ->required(),
                            Forms\Components\Select::make('style')
                                ->options([
                                    'default' => 'Default',
                                    'bumper' => 'Bumper',
                                    'banner' => 'Banner',
                                    'toast' => 'Toast',
                                ])
                                ->helperText('Select the style of the alert.')
                                ->default('default')
                                ->required(),
                        ]),
                        Group::make()->schema([
                            Forms\Components\TextInput::make('title')
                                ->lazy()
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('title', Str::slug($state)))
                                ->required()
                                ->label('Title Tag')
                                ->helperText('The tag title of the alert. This is useful to remember what the alert is for. Max: 140 characters.')
                                ->maxLength(140),
                            Forms\Components\TextInput::make('button_text')
                                ->default('Close')
                                ->label('Button Text')
                                ->helperText('The text to display on the button. Max: 50 characters. Default is "Close". Leave empty for a close icon.')
                                ->maxLength(50),
                        ]),
                        Forms\Components\RichEditor::make('message')
                            ->required()
                            ->columnSpan(3)
                            ->helperText('The message to display in the alert. Max: 2500 characters.')
                            ->maxLength(6000),
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
            'index' => Pages\ListAlerts::route('/'),
            'create' => Pages\CreateAlert::route('/create'),
            'edit' => Pages\EditAlert::route('/{record}/edit'),
        ];
    }
}

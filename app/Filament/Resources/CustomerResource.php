<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Tables\Actions\ActionGroup;
use App\Filament\Resources\CustomerResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CustomerResource\RelationManagers;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Tables\Columns\Layout\Stack;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    public static function getNavigationLabel(): string
    {
        return __('Customers');
    }
    protected static ?string $navigationGroup = 'App Sections';
    protected static ?int $navigationSort = 4;

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::count() > 0) {
            return static::getModel()::count();
        }
        return null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    CuratorPicker::make('logo')
                        ->maxSize(2000)
                        ->directory('public/customer')
                        ->helperText('The logo of the customer. Max 2MB')
                        ->label('Brand Logo')
                        ->required(),
                ]),
                Group::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->maxLength(100)
                        ->helperText('The name of the customer. Max 100 characters.')
                        ->label('Customer Name (optional)'),
                    Forms\Components\TextInput::make('url')
                        ->maxLength(240)
                        ->helperText('The website URL of the customer. Max 240 characters.')
                        ->prefixIcon('heroicon-o-link')
                        ->prefix('https://www.')
                        ->columnSpan(2)
                        ->label('Website URL (optional)')
                        ->columnSpanFull(),
                ]),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    CuratorColumn::make('logo')
                        ->label('Brand Logo')
                        ->size(90),
                    Tables\Columns\TextColumn::make('name')
                        ->searchable()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('url')
                        ->searchable()
                        ->sortable(),
                ])
            ])->contentGrid([
                    'md' => 3,
                    'xl' => 5,
                ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\EditAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCustomers::route('/'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function getNavigationLabel(): string
    {
        return __('Customers');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Core Features');
    }

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::count() > 0) {
            return static::getModel()::count();
        }

        return null;
    }

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        CuratorPicker::make('logo')
                            ->multiple(false)
                            ->maxItems(1)
                            ->directory('public/customer')
                            ->helperText(__('💡 Transparent file will be best for the logo.'))
                            ->label(__('Logo'))
                            ->required(),
                    ]),
                Group::make()->schema([
                    TextInput::make('name')
                        ->maxLength(100)
                        ->helperText('The name of the customer. Max 100 characters.')
                        ->label(__('Name (Optional)')),
                    TextInput::make('url')
                        ->maxLength(240)
                        ->helperText('The website URL of the customer. Max 240 characters.')
                        ->prefixIcon('heroicon-o-link')
                        ->prefix('https://www.')
                        ->columnSpan(2)
                        ->label(__('Website URL (optional)'))
                        ->columnSpanFull(),
                ]),
            ])
            ->columns(2);
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
                ]),
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
                ]),
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

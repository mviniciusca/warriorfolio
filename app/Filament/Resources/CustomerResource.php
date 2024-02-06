<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\Layout\View;
use App\Filament\Resources\CustomerResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CustomerResource\RelationManagers;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Clients';
    protected static ?string $navigationGroup = 'App Sections';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    CuratorPicker::make('logo')
                        ->directory('customers')
                        ->label('Brand Logo')
                        //->imageCropAspectRatio('16:9')
                        ->required(),
                ]),
                Group::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->maxLength(255)
                        ->label('Customer Name (optional)'),
                    Forms\Components\TextInput::make('url')
                        ->maxLength(255)
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
                View::make('admin.brands.customers'),
            ])
            ->contentGrid([
                'md' => 3,
                'xl' => 4,
            ])
            ->defaultSort('id', 'desc')
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
                    // Tables\Actions\DeleteBulkAction::make(),
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

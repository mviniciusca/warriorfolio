<?php

namespace App\Filament\Widgets;

use App\Models\Core;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class CoreModules extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    protected static ?int $sort = 0;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Core::query()->select()
            )
            ->heading('Core Modules Status')
            ->description('This table shows the status of the core modules of the website.')
            ->paginated(false)
            ->columns([
                IconColumn::make('about')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('clients')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('contact')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('footer')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('header')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('hero')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('newsletter')
                    ->alignCenter()
                    ->boolean(),
                IconColumn::make('portfolio')
                    ->alignCenter()
                    ->boolean(),
            ]);
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class CategoryStatsWidget extends BaseWidget
{
    protected static ?string $heading = 'Categories Overview';

    protected static ?string $description = 'Projects by category';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Category::query()
                    ->where('is_project', true)
                    ->where('is_active', true)
                    ->withCount(['project' => function ($query) {
                        $query->where('is_active', true);
                    }])
                    ->orderByDesc('project_count')
            )
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->columns([
                TextColumn::make('name')
                    ->label(__('Category'))
                    ->searchable()
                    ->color(fn (Category $record): string => $record->project_count > 0 ? 'success' : 'gray'
                    )
                    ->icon('heroicon-m-tag'),

                TextColumn::make('project_count')
                    ->label(__('Projects'))
                    ->sortable()
                    ->alignRight()
                    ->badge(),

                TextColumn::make('hex_color')
                    ->label(__('Category Color'))
                    ->badge()
                    ->formatStateUsing(fn () => '')
                    ->color(fn (Category $record) => $record->hex_color),
            ])
            ->actions([
                Action::make('view')
                    ->url(fn (Category $record): string => route('filament.admin.resources.categories.edit', ['record' => $record])
                    )
                    ->icon('heroicon-m-pencil-square')
                    ->tooltip(__('Edit Category'))
                    ->color('gray'),
            ])
            ->paginated(false);
    }
}

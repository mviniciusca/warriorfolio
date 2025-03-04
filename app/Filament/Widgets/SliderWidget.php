<?php

namespace App\Filament\Widgets;

use App\Models\Slideshow;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class SliderWidget extends BaseWidget
{
    protected static ?int $sort = 7;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Slideshow::query()
                    ->select()
                    ->where('is_active', true)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
            )
            ->heading(__('Active Sliders'))
            ->description(__('Active sliders in your application.'))
            ->headerActions(
                [
                    ViewAction::make()
                        ->url(route('filament.admin.resources.slideshows.index'))
                        ->label('View All')
                        ->icon('heroicon-o-arrow-up-right')
                        ->outlined()
                        ->size('xs'),
                ]
            )
            ->striped()
            ->emptyStateIcon('heroicon-o-photo')
            ->emptyStateHeading('No active sliders')
            ->paginated(false)
            ->columns([
                IconColumn::make('is_active')
                    ->boolean()
                    ->label(''),
                TextColumn::make('title')
                    ->label('Title'),
                TextColumn::make('module_name')
                    ->label('Activated On'),
            ]);
    }
}

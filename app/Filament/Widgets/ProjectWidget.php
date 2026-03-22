<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ProjectResource;
use App\Models\Page;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ProjectWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Page::query()
                    ->where('style', '=', 'project')
                    ->whereHas('project', function ($query) {
                        $query->where('is_active', true);
                    })
                    ->latest()
                    ->limit(8)
            )
            ->contentGrid([
                'sm' => 2,
                'md' => 2,
                'lg' => 3,
                'xl' => 4,
            ])
            ->heading(__('Published Projects'))
            ->description(
                __(
                    'Projects that are live on your portfolio. Use this grid to spot what is active and jump straight into editing a project page.'
                )
            )
            ->columns([
                View::make('filament.widgets.projects.card'),
            ])
            ->recordUrl(fn (Page $record): string => ProjectResource::getUrl('edit', ['record' => $record]))
            ->emptyStateIcon('heroicon-o-rocket-launch')
            ->emptyStateHeading(__('No Projects'))
            ->emptyStateDescription(__('Create your first project to see it here'))
            ->paginated(false);
    }
}

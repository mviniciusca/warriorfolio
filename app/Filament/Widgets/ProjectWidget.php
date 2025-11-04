<?php

namespace App\Filament\Widgets;

use App\Models\Page;
use App\Models\Project;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ProjectWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Featured Projects';

    protected static ?string $description = 'Your latest published projects';

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
            ->description(__('See the latest published projects.'))
            ->columns([
                View::make('filament.widgets.projects.card'),
            ])
            ->recordUrl(fn (Page $record): string => route('filament.admin.resources.projects.edit', ['record' => $record]))
            ->emptyStateIcon('heroicon-o-rocket-launch')
            ->emptyStateHeading(__('No Projects'))
            ->emptyStateDescription(__('Create your first project to see it here'))
            ->paginated(false);
    }
}

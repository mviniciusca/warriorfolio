<?php

namespace App\Filament\Widgets;

use App\Models\Page;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TechnologyStatsWidget extends ChartWidget
{
    protected static ?string $heading = 'Most Used Technologies';

    protected static ?string $description = 'Technologies used across your projects';

    protected static ?int $sort = 11;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $projects = Page::where('style', '=', 'project')
            ->whereHas('project', function ($query) {
                $query->where('is_active', true);
            })
            ->with('project')
            ->get();

        $technologies = [];

        foreach ($projects as $project) {
            if ($project->project && $project->project->tech_stack) {
                foreach ($project->project->tech_stack as $tech) {
                    if (! isset($technologies[$tech])) {
                        $technologies[$tech] = 0;
                    }
                    $technologies[$tech]++;
                }
            }
        }

        arsort($technologies);
        $technologies = array_slice($technologies, 0, 10);

        return [
            'datasets' => [
                [
                    'label'           => 'Usage Count',
                    'data'            => array_values($technologies),
                    'backgroundColor' => [
                        '#6366F1', '#8B5CF6', '#EC4899', '#F43F5E', '#F97316',
                        '#EAB308', '#22C55E', '#3B82F6', '#A855F7', '#EC4899',
                    ],
                ],
            ],
            'labels' => array_keys($technologies),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

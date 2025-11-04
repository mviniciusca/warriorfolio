<?php

namespace App\Filament\Widgets;

use App\Models\Mail;
use App\Models\Newsletter;
use App\Models\Page;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EngagementMetricsWidget extends BaseWidget
{
    protected ?string $heading = 'Engagement Overview';

    protected static ?int $sort = 13;

    protected function getColumns(): int
    {
        return 4;
    }

    protected function getStats(): array
    {
        // Calcula a taxa de resposta de mensagens
        $totalMessages = Mail::count();
        $repliedMessages = Mail::where('is_sent', true)->count();
        $responseRate = $totalMessages > 0 ? round(($repliedMessages / $totalMessages) * 100) : 0;

        // Calcula a média de tecnologias por projeto
        $projects = Page::where('style', '=', 'project')
            ->whereHas('project', function ($query) {
                $query->where('is_active', true);
            })
            ->with('project')
            ->get();

        $techCount = 0;
        $projectCount = $projects->count();
        foreach ($projects as $project) {
            if ($project->project && $project->project->tech_stack) {
                $techCount += count($project->project->tech_stack);
            }
        }
        $avgTechPerProject = $projectCount > 0 ? round($techCount / $projectCount, 1) : 0;

        // Calcula a média mensal de posts
        $totalPosts = Page::where('style', '=', 'blog')->count();
        $firstPost = Page::where('style', '=', 'blog')->oldest()->first();
        $monthsSinceFirst = $firstPost
            ? now()->diffInMonths($firstPost->created_at) + 1
            : 1;
        $postsPerMonth = round($totalPosts / $monthsSinceFirst, 1);

        // Taxa de crescimento de inscritos
        $currentMonth = Newsletter::whereMonth('created_at', now()->month)->count();
        $lastMonth = Newsletter::whereMonth('created_at', now()->subMonth()->month)->count();
        $growthRate = $lastMonth > 0
            ? round((($currentMonth - $lastMonth) / $lastMonth) * 100, 1)
            : ($currentMonth > 0 ? 100 : 0);

        return [
            Stat::make('Response Rate', $responseRate.'%')
                ->description('Message response rate')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('success')
                ->chart([0, 20, 40, 60, 80, $responseRate]),

            Stat::make('Technologies per Project', $avgTechPerProject)
                ->description('Average tech stack size')
                ->descriptionIcon('heroicon-m-cpu-chip')
                ->color('info')
                ->chart([0, $avgTechPerProject / 2, $avgTechPerProject]),

            Stat::make('Posts per Month', $postsPerMonth)
                ->description('Average monthly posts')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('warning')
                ->chart([0, $postsPerMonth / 2, $postsPerMonth]),

            Stat::make('Subscriber Growth', ($growthRate >= 0 ? '+' : '').$growthRate.'%')
                ->description('Month over month')
                ->descriptionIcon('heroicon-m-user-group')
                ->color($growthRate >= 0 ? 'success' : 'danger')
                ->chart([-100, -50, 0, 50, 100, max(-100, min(100, $growthRate))]),
        ];
    }
}

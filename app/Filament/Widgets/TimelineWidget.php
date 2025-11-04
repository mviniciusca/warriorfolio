<?php

namespace App\Filament\Widgets;

use App\Models\Mail;
use App\Models\Page;
use App\Models\Project;
use Filament\Widgets\Widget;
use Illuminate\Support\Carbon;

class TimelineWidget extends Widget
{
    protected static string $view = 'filament.widgets.timeline';

    protected int|string|array $columnSpan = 2;

    protected static ?int $sort = 12;

    public function getViewData(): array
    {
        $events = collect();

        // Adiciona projetos
        Page::where('style', '=', 'project')
            ->whereHas('project', function ($query) {
                $query->where('is_active', true);
            })
            ->with('project')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->each(function ($project) use ($events) {
                $events->push([
                    'type'  => 'project',
                    'icon'  => 'heroicon-o-rocket-launch',
                    'color' => 'success',
                    'title' => 'New Project: '.$project->title,
                    'date'  => $project->created_at,
                ]);
            });

        // Add blog posts
        Page::where('style', '=', 'blog')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->each(function ($post) use ($events) {
                $events->push([
                    'type'  => 'post',
                    'icon'  => 'heroicon-o-document-text',
                    'color' => 'info',
                    'title' => 'New Post: '.$post->title,
                    'date'  => $post->created_at,
                ]);
            });

        // Add important messages
        Mail::where('is_important', true)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->each(function ($mail) use ($events) {
                $events->push([
                    'type'  => 'mail',
                    'icon'  => 'heroicon-o-envelope',
                    'color' => 'warning',
                    'title' => 'Important Message: '.$mail->subject,
                    'date'  => $mail->created_at,
                ]);
            });

        return [
            'events' => $events->sortByDesc('date')->take(10),
        ];
    }
}

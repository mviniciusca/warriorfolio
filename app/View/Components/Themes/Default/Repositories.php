<?php

namespace App\View\Components\Themes\Default;

use App\Models\Setting;
use App\Services\GithubService;
use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;
use Throwable;

class Repositories extends Component
{
    use SectionLoader;

    public ?string $githubUser;

    public ?array $showOnlyRepositories;

    public ?int $repoQuantity;

    public ?bool $is_app_active;

    public ?bool $show_graphs;

    public ?bool $show_repositories_feed;

    public function __construct()
    {
        try {
            $this->loadSection('github-repositories');

            $settings = Setting::first(['config'])?->config ?? [];
            $this->githubUser = $settings['github_username'] ?? null;
            $this->showOnlyRepositories = $settings['github_repositories'] ?? null;
            $this->repoQuantity = isset($settings['repository_quantity']) ? (int) $settings['repository_quantity'] : null;
            $this->is_app_active = (bool) ($settings['github_is_active'] ?? false);
            $this->show_graphs = (bool) ($settings['show_graphs'] ?? true);
            $this->show_repositories_feed = (bool) ($settings['show_repositories_feed'] ?? true);
        } catch (Throwable $e) {
            Log::error('Error initializing Default Repositories component', [
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            $this->githubUser = null;
            $this->showOnlyRepositories = null;
            $this->repoQuantity = null;
            $this->is_app_active = false;
            $this->show_graphs = false;
            $this->show_repositories_feed = false;

            try {
                $this->loadSection('github-repositories');
            } catch (Throwable) {
                //
            }
        }
    }

    public function render(): View|Closure|string
    {
        if (! $this->is_active || ! $this->is_app_active) {
            return '';
        }

        try {
            $githubService = $this->githubService();
            $repositories = $githubService->showRepositories();

            return view('components.themes.default.repositories', [
                'repositories' => $repositories,
                'githubUser' => $githubService->githubUser,
                'show_graphs' => $this->show_graphs,
                'show_repositories_feed' => $this->show_repositories_feed,
                'render_content' => true,
            ]);
        } catch (Throwable $e) {
            Log::error('Error rendering Default Repositories component', [
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'githubUser' => $this->githubUser,
            ]);

            return view('components.themes.default.repositories', [
                'repositories' => [],
                'githubUser' => $this->githubUser,
                'show_graphs' => $this->show_graphs,
                'show_repositories_feed' => $this->show_repositories_feed,
                'render_content' => true,
            ]);
        }
    }

    public function githubService(): GithubService
    {
        try {
            return new GithubService($this->githubUser, $this->showOnlyRepositories, $this->repoQuantity);
        } catch (Throwable $e) {
            Log::error('Error creating GithubService (default theme)', [
                'exception' => $e->getMessage(),
                'githubUser' => $this->githubUser,
            ]);

            return new GithubService($this->githubUser ?? config('warriorfolio.github_username'), null, null);
        }
    }
}

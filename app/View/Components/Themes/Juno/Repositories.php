<?php

namespace App\View\Components\Themes\Juno;

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

            $settings = Setting::first(['config'])->config ?? null;
            $this->githubUser = $settings['github_username'] ?? null;
            $this->showOnlyRepositories = $settings['github_repositories'] ?? null;
            $this->repoQuantity = $settings['repository_quantity'] ?? null;
            $this->is_app_active = $settings['github_is_active'] ?? null;
            $this->show_graphs = $settings['show_graphs'] ?? null;
            $this->show_repositories_feed = $settings['show_repositories_feed'] ?? null;
        } catch (Throwable $e) {
            Log::error('Error initializing Repositories component', [
                'exception' => $e->getMessage(),
                'file'      => $e->getFile(),
                'line'      => $e->getLine(),
            ]);

            // Set default values in case of error
            $this->githubUser = null;
            $this->showOnlyRepositories = null;
            $this->repoQuantity = null;

            $this->loadSection('github-repositories');
        }
    }

    public function render(): View|Closure|string
    {
        try {
            $githubService = $this->githubService();
            $repositories = $githubService->showRepositories();

            return view('components.themes.juno.repositories', [
                'repositories' => $repositories,
                'githubUser'   => $githubService->githubUser,
            ]);
        } catch (Throwable $e) {
            Log::error('Error rendering Repositories component', [
                'exception'  => $e->getMessage(),
                'file'       => $e->getFile(),
                'line'       => $e->getLine(),
                'githubUser' => $this->githubUser,
            ]);

            // Return empty repositories in case of error
            return view('components.themes.juno.repositories', [
                'repositories' => [],
                'githubUser'   => $this->githubUser,
            ]);
        }
    }

    public function githubService(): GithubService
    {
        try {
            return new GithubService($this->githubUser, $this->showOnlyRepositories, $this->repoQuantity);
        } catch (Throwable $e) {
            Log::error('Error creating GithubService instance', [
                'exception'  => $e->getMessage(),
                'file'       => $e->getFile(),
                'line'       => $e->getLine(),
                'githubUser' => $this->githubUser,
            ]);

            // Use fallback in case of error
            return new GithubService('mviniciusca', null, null);
        }
    }
}

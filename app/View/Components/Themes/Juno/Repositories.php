<?php

namespace App\View\Components\Themes\Juno;

use App\Services\GithubService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Repositories extends Component
{
    public ?string $githubUser;

    public ?array $showOnlyRepositories;

    public ?int $repoQuantity;

    public function __construct()
    {
        $this->githubUser = null;
        $this->showOnlyRepositories = null;
        $this->repoQuantity = null;
    }

    public function render(): View|Closure|string
    {
        return view('components.themes.juno.repositories', [
            'repositories' => $this->githubService()->showRepositories(),
            'githubUser'   => $this->githubService()->githubUser,
        ]);
    }

    public function githubService(): GithubService
    {
        return new GithubService($this->githubUser ?? 'mviniciusca', $this->showOnlyRepositories ?? null, $this->repoQuantity ?? null);
    }

    public function getRepositories():array
    {
        return [];
    }
}

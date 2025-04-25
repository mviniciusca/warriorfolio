<?php

namespace App\View\Components\Themes\Juno;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Repositories extends Component
{
    // public ?string $githubUsername; // GitHub username

    public string $githubApiUrl = 'https://github.com/repositores/'; // GitHub API URL

    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $githubUser, public ?int $repoQuantity, public ?int $repoStars,
    public ?int $repoForks, public ?string $repoName, public ?string $repoDescription
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.themes.juno.repositories');
    }

    public function getRepositories()
    {
    }

    public function githubUserData()
    {
    }

    public function githubApiSettings()
    {
    }
}

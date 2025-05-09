<?php

namespace App\View\Components\Themes\Juno;

use App\Services\GithubService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Repositories extends Component
{
    public function __construct()
    {
        //
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
        return new GithubService('mviniciusca', [], 9);
    }
}

<?php

namespace App\View\Components\Themes\Juno;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Repositories extends Component
{
    public string $githubRepoApiUrl = 'https://api.github.com/repos/';

    private ?string $githubToken;

    public function __construct(
        public ?string $githubUser,
        public ?int $repoQuantity = null,
        public ?int $repoStars = null,
        public ?int $repoForks = null,
        public ?string $repoName = null,
        public ?string $repoDescription = null
    ) {
        $this->githubToken = env('GITHUB_API_TOKEN');
    }

    public function render(): View|Closure|string
    {
        return view('components.themes.juno.repositories', [
            'repositories' => $this->showRepositories(),
        ]);
    }

    public function showRepositories()
    {
        // Define the fixed list of repository names to fetch
        $repoNamesToFetch = [
            'warriorfolio',
            'warriorfolio-docs',
            'codhous',
            'reacast',
            'cardbolt',
        ];

        // If no user is provided, return empty array
        if (empty($this->githubUser)) {
            return [];
        }

        // Generate a unique cache key using the repo names
        $repoNamesHash = md5(implode(',', $repoNamesToFetch));
        $cacheKey = "github-repos-{$this->githubUser}-{$repoNamesHash}";
        $cacheDuration = 3600; // 1 hour in seconds

        return Cache::remember($cacheKey, $cacheDuration, function () use ($repoNamesToFetch) {
            $repositories = [];

            foreach ($repoNamesToFetch as $repoName) {
                $api = $this->githubRepoApiUrl.$this->githubUser.'/'.$repoName;

                $response = Http::withToken($this->githubToken)->get($api);

                if ($response->successful()) {
                    $repositories[] = $response->json();
                } else {
                    Log::warning("Failed to fetch GitHub repo: {$this->githubUser}/{$repoName}. Status: ".$response->status());
                }
            }

            return $repositories;
        });
    }
}

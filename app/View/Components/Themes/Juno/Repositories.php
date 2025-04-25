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
    public string $githubApiUrl = 'https://api.github.com/users/';

    public string $githubRepoApiUrl = 'https://api.github.com/repos/';

    private ?string $githubToken;

    public function __construct(
        public ?string $githubUser,
        public ?array $showOnlyRepositories = null,
        public ?int $repoQuantity = null
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
        if (empty($this->githubUser)) {
            return [];
        }

        // Check if we have specific repositories to show
        if (! empty($this->showOnlyRepositories)) {
            $repos = $this->fetchSpecificRepositories($this->showOnlyRepositories);
        } else {
            // Fetch all non-fork repositories and sort by stars
            $repos = $this->fetchAllRepositories();
        }

        // Sort by number of stars (descending)
        usort($repos, function ($a, $b) {
            return ($b['stargazers_count'] ?? 0) - ($a['stargazers_count'] ?? 0);
        });

        // Apply limit if repoQuantity is set
        if ($this->repoQuantity !== null && $this->repoQuantity > 0) {
            $repos = array_slice($repos, 0, $this->repoQuantity);
        }

        return $repos;
    }

    private function fetchSpecificRepositories(array $repoNames)
    {
        $cacheKey = "github-specific-repos-{$this->githubUser}-".md5(implode(',', $repoNames));
        $cacheDuration = 3600;

        return Cache::remember($cacheKey, $cacheDuration, function () use ($repoNames) {
            $repositories = [];

            foreach ($repoNames as $repoName) {
                $api = $this->githubRepoApiUrl.$this->githubUser.'/'.$repoName;

                $response = Http::withToken($this->githubToken)->get($api);

                if ($response->successful()) {
                    $repo = $response->json();
                    // Only add if it's not a fork
                    if (! ($repo['fork'] ?? false)) {
                        $repositories[] = $repo;
                    }
                } else {
                    Log::warning("Failed to fetch GitHub repo: {$this->githubUser}/{$repoName}. Status: ".$response->status());
                }
            }

            return $repositories;
        });
    }

    private function fetchAllRepositories()
    {
        $cacheKey = "github-all-repos-{$this->githubUser}";
        $cacheDuration = 3600;

        return Cache::remember($cacheKey, $cacheDuration, function () {
            $api = $this->githubApiUrl.$this->githubUser.'/repos';

            $response = Http::withToken($this->githubToken)
                ->get($api, [
                    'type'      => 'owner', // Only show repositories owned by the user
                    'sort'      => 'updated',
                    'direction' => 'desc',
                    'per_page'  => 100,
                ]);

            if ($response->successful()) {
                // Filter out forks after getting the response
                return array_filter($response->json(), function ($repo) {
                    return ! ($repo['fork'] ?? false);
                });
            } else {
                Log::warning("Failed to fetch repositories for user: {$this->githubUser}. Status: ".$response->status());

                return [];
            }
        });
    }
}

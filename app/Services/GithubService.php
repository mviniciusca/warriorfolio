<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GithubService
{
    public string $githubApiUrl = 'https://api.github.com/users/';

    public string $githubRepoApiUrl = 'https://api.github.com/repos/';

    private ?string $githubToken;

    public function __construct(
        public ?string $githubUser,
        public ?array $showOnlyRepositories = null,
        public ?int $repoQuantity = null
    ) {
        $this->githubToken = $this->getGithubToken();
    }

    public function getGithubToken()
    {
        $token = Setting::first(['config'])->config['github_token'] ?? null;
        if (empty($token)) {
            $token = config('warriorfolio.github_api_token', env('GITHUB_API_TOKEN'));
            Log::info('Using GitHub API token from config');
        } else {
            Log::info('Using GitHub API token from settings table');
        }

        return $token;
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
                    Log::warning("Failed to fetch GitHub repo: {$this->githubUser}/{$repoName}. Status: ".$response->status(), [
                        'response'  => $response->body(),
                        'api_url'   => $api,
                        'has_token' => ! empty($this->githubToken),
                    ]);
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
                Log::info("Successfully fetched repositories for user: {$this->githubUser}");

                // Filter out forks after getting the response
                return array_filter($response->json(), function ($repo) {
                    return ! ($repo['fork'] ?? false);
                });
            } else {
                Log::warning("Failed to fetch repositories for user: {$this->githubUser}. Status: ".$response->status(), [
                    'response'  => $response->body(),
                    'api_url'   => $api,
                    'has_token' => ! empty($this->githubToken),
                ]);

                return [];
            }
        });
    }
}

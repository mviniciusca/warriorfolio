<?php

namespace App\View\Components\Themes\Juno;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache; // Import Cache facade
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Repositories extends Component
{
    // Remove githubApiUrl as we use githubRepoApiUrl now
    // public string $githubApiUrl = 'https://api.github.com/users/'; // GitHub API URL

    // Add base URL for fetching individual repos
    public string $githubRepoApiUrl = 'https://api.github.com/repos/';

    private ?string $githubToken;

    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $githubUser, public ?int $repoQuantity, public ?int $repoStars,
    public ?int $repoForks, public ?string $repoName, public ?string $repoDescription
    ) {
        $this->githubToken = env('GITHUB_API_TOKEN');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // Call showRepositories to get the specifically fetched repos (potentially from cache)
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

        // Generate a unique cache key. Using a hash of repo names ensures the key changes if the list does.
        $repoNamesHash = md5(implode(',', $repoNamesToFetch));
        $cacheKey = "github-repos-{$this->githubUser}-{$repoNamesHash}";
        $cacheDuration = 3600; // 1 hour in seconds

        // Pass necessary variables into the closure using 'use'
        $fetchedRepositories = Cache::remember($cacheKey, $cacheDuration, function () use ($repoNamesToFetch, $cacheDuration) {
            $repositories = [];
            // Access properties via $this inside the closure is now possible because
            // the closure is bound to the class instance by default in PHP >= 5.4
            // However, explicitly passing can sometimes be clearer or necessary in older versions/different contexts.
            // Let's keep accessing via $this for simplicity unless it causes issues.
            // If issues persist, we would pass them explicitly: use ($repoNamesToFetch, $cacheDuration, $githubToken, $githubUser, ...)

            foreach ($repoNamesToFetch as $repoName) {
                // Construct the API URL for the specific repository
                $api = $this->githubRepoApiUrl.$this->githubUser.'/'.$repoName; // Use $this here

                $response = Http::withToken($this->githubToken)->get($api); // Use $this here

                // Check if the request was successful and add the repo data
                if ($response->successful()) {
                    $repositories[] = $response->json();
                } else {
                    // Optional: Log error if a specific repo couldn't be fetched
                    Log::warning("Failed to fetch GitHub repo: {$this->githubUser}/{$repoName}. Status: ".$response->status().". This result will be cached for {$cacheDuration} seconds."); // Use $this here
                }

                // Stop fetching if quantity limit is reached (inside the closure)
                if ($this->repoQuantity && count($repositories) >= $this->repoQuantity) { // Use $this here
                    break;
                }
            }

            return $repositories; // This value will be cached
        });

        // Apply quantity limit again outside cache closure, in case it wasn't applied inside
        // (e.g., if fetched from cache or loop finished before limit)
        if ($this->repoQuantity && count($fetchedRepositories) > $this->repoQuantity) {
            return array_slice($fetchedRepositories, 0, $this->repoQuantity);
        }

        return $fetchedRepositories;
    }
}

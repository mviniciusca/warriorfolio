<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestGithubConnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'github:test {username?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test GitHub API connection and token';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $username = $this->argument('username');

        if (! $username) {
            $settings = Setting::first(['config'])->config ?? null;
            $username = $settings['github_username'] ?? config('warriorfolio.github_username', 'mviniciusca');
        }

        $this->info("Testing GitHub API connection for user: {$username}");
        $this->newLine();

        // Get token
        $token = Setting::first(['config'])->config['github_token'] ?? null;
        if (empty($token)) {
            $token = config('warriorfolio.github_api_token', env('GITHUB_API_TOKEN'));
            $this->warn('Using token from config/env');
        } else {
            $this->info('Using token from settings table');
        }

        if (empty($token)) {
            $this->error('No GitHub token found!');
            $this->info('Please set GITHUB_API_TOKEN in your .env file or configure it in the admin panel.');

            return Command::FAILURE;
        }

        $this->info('Token found: '.substr($token, 0, 10).'...');
        $this->newLine();

        // Test token validity
        $this->info('Testing token validity...');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->get('https://api.github.com/user');

        if (! $response->successful()) {
            $this->error('Token validation failed!');
            $this->error('Status: '.$response->status());
            $this->error('Response: '.$response->body());
            $this->newLine();
            $this->warn('Your GitHub token may be expired or invalid.');
            $this->info('Please generate a new token at: https://github.com/settings/tokens');

            return Command::FAILURE;
        }

        $tokenUser = $response->json();
        $this->info('✓ Token is valid for user: '.$tokenUser['login']);
        $this->newLine();

        // Test fetching repositories
        $this->info("Fetching repositories for user: {$username}...");
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->get("https://api.github.com/users/{$username}/repos", [
            'type'      => 'owner',
            'sort'      => 'updated',
            'direction' => 'desc',
            'per_page'  => 10,
        ]);

        if (! $response->successful()) {
            $this->error('Failed to fetch repositories!');
            $this->error('Status: '.$response->status());
            $this->error('Response: '.$response->body());

            return Command::FAILURE;
        }

        $repos = $response->json();
        $repoCount = count($repos);

        $this->info("✓ Successfully fetched {$repoCount} repositories");
        $this->newLine();

        if ($repoCount > 0) {
            $this->info('Top repositories:');
            $this->table(
                ['Name', 'Stars', 'Forks', 'Language', 'Fork'],
                array_slice(array_map(function ($repo) {
                    return [
                        $repo['name'],
                        $repo['stargazers_count'] ?? 0,
                        $repo['forks_count'] ?? 0,
                        $repo['language'] ?? 'N/A',
                        $repo['fork'] ? 'Yes' : 'No',
                    ];
                }, $repos), 0, 5)
            );
        }

        $this->newLine();
        $this->info('✓ GitHub API connection test completed successfully!');

        return Command::SUCCESS;
    }
}

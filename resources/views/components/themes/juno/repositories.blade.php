@props(['githubUser' => null, 'repositories' => []]) {{-- Add repositories prop with default empty array --}}

<!-- Repositories Tab -->
<div class="tab-pane" id="repositories-content">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">Open Source
                Projects</h2>
            <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">A collection of my
                public repositories and contributions</p>
        </div>
        {{-- ...existing code... --}}
        {{-- Make Follow link dynamic --}}
        <a class="inline-flex items-center gap-2 rounded-md border border-secondary-300 bg-white px-4 py-2 text-sm font-medium text-secondary-900 transition-colors hover:border-secondary-400 hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:hover:border-secondary-700 dark:hover:bg-secondary-900 dark:focus:ring-secondary-600 dark:focus:ring-offset-secondary-950"
            href="{{ $githubUser ? 'https://github.com/' . $githubUser : '#' }}">
            <x-ui.ionicon class="h-5 w-5" icon="logo-github" />
            Follow on GitHub
        </a>
    </div>
    <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3"> {{-- Adjusted grid cols for responsiveness --}}
        {{-- Start Loop --}}
        @forelse ($repositories as $repository)
            <a class="flex aspect-[4/3] flex-col justify-between rounded border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50 dark:hover:border-secondary-700"
                href="{{ $repository['html_url'] ?? '#' }}" rel="noopener noreferrer" target="_blank">
                <div>
                    <h3 class="truncate text-sm font-medium dark:text-secondary-100"
                        title="{{ $repository['name'] ?? 'N/A' }}">
                        {{ $repository['name'] ?? 'N/A' }}
                    </h3>
                    <p class="mt-1 line-clamp-3 text-xs text-secondary-600 dark:text-secondary-400"
                        title="{{ $repository['description'] ?? '' }}">
                        {{ $repository['description'] ?? 'No description available.' }}
                    </p>
                </div>
                <div class="mt-2 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        {{-- Stars --}}
                        <span class="text-xs text-secondary-500 dark:text-secondary-500" title="Stars">
                            <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                                width="16" xmlns="http://www.w3.org/2000/svg">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            {{ $repository['stargazers_count'] ?? 0 }}
                        </span>
                        {{-- Forks --}}
                        <span class="text-xs text-secondary-500 dark:text-secondary-500" title="Forks">
                            <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                                width="16" xmlns="http://www.w3.org/2000/svg">
                                <line x1="6" x2="6" y1="3" y2="15">
                                </line>
                                <circle cx="18" cy="6" r="3"></circle>
                                <circle cx="6" cy="18" r="3"></circle>
                                <path d="M18 9a9 9 0 0 1-9 9"></path>
                            </svg>
                            {{ $repository['forks_count'] ?? 0 }}
                        </span>
                    </div>
                    {{-- Language --}}
                    @if (!empty($repository['language']))
                        <span
                            class="rounded bg-secondary-100 px-1.5 py-0.5 text-xs text-secondary-800 dark:bg-secondary-900/50 dark:text-secondary-300">
                            {{ $repository['language'] }}
                        </span>
                    @endif
                </div>
            </a>
        @empty
            {{-- Message when no repositories are found --}}
            <div
                class="col-span-1 mt-4 text-center text-secondary-600 dark:text-secondary-400 sm:col-span-2 md:col-span-3">
                No repositories found.
            </div>
        @endforelse
        {{-- End Loop --}}
    </div>
</div>

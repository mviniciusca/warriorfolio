@props(['githubUser' => null, 'repositories' => [], 'repoQuantity' => null, 'title' => null, 'subtitle' => null])

@if($is_active ?? true)
<x-themes.juno.partials.header :buttonIcon="$buttonIcon ?? 'logo-github'" :buttonUrl="$button_url"
    :button="$button_header" :$subtitle :$title />


@if($show_graphs)
<!-- GitHub Contribution Graph -->
<div
    class="mb-8 overflow-hidden rounded-lg border border-secondary-200 bg-white/0 p-4 dark:border-secondary-800/50 dark:bg-secondary-900/50">
    <img alt="GitHub Contributions Graph" class="w-full grayscale dark:hidden"
        src="https://ghchart.rshah.org/{{ $githubUser }}">
    <img alt="GitHub Contributions Graph" class="hidden w-full opacity-90 grayscale invert dark:block"
        src="https://ghchart.rshah.org/{{ $githubUser }}">
</div>
@endif

@if($show_repositories_feed)
<div class="grid grid-cols-2 gap-2 sm:grid-cols-2 md:grid-cols-3">
    @if (!empty($repositories))
    @foreach ($repositories as $repository)
    <a class="group relative flex aspect-[5/3] flex-col justify-between overflow-hidden rounded border border-secondary-200 p-4 transition-all hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50 dark:hover:border-secondary-700"
        data-language="{{ $repository['language'] ?? '' }}" data-repository-card
        href="{{ $repository['html_url'] ?? '#' }}" rel="noopener noreferrer" target="_blank">
        <div
            class="language-gradient pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
        </div>
        <div class="relative">
            <div class="flex items-center gap-2">
                <svg class="h-4 w-4 text-secondary-500 dark:text-secondary-400" fill="currentColor" viewBox="0 0 16 16"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z" />
                </svg>
                <h3 class="truncate text-sm font-medium dark:text-secondary-100"
                    title="{{ $repository['name'] ?? 'N/A' }}">
                    {{ $repository['name'] ?? 'N/A' }}
                </h3>
            </div>
            <p class="mt-3 line-clamp-3 text-xs leading-relaxed text-secondary-600 dark:text-secondary-400"
                title="{{ $repository['description'] ?? '' }}">
                {{ $repository['description'] ?? 'No description available.' }}
            </p>
        </div>
        <div class="mt-2 flex items-center justify-between">
            <divgp class="flex items-center space-x-2">
                {{-- Stars --}}
                <span class="text-xs text-secondary-500 dark:text-secondary-500" title="Stars">
                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" width="16"
                        xmlns="http://www.w3.org/2000/svg">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                    {{ $repository['stargazers_count'] ?? 0 }}
                </span>
                {{-- Forks --}}
                <span class="text-xs text-secondary-500 dark:text-secondary-500" title="Forks">
                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" width="16"
                        xmlns="http://www.w3.org/2000/svg">
                        <line x1="6" x2="6" y1="3" y2="15">
                        </line>
                        <circle cx="18" cy="6" r="3"></circle>
                        <circle cx="6" cy="18" r="3"></circle>
                        <path d="M18 9a9 9 0 0 1-9 9"></path>
                    </svg>
                    {{ $repository['forks_count'] ?? 0 }}
                </span>
            </divgp>
            {{-- Language --}}
            @if (!empty($repository['language']))
            <span
                class="rounded bg-secondary-100 px-1.5 py-0.5 text-xs text-secondary-800 dark:bg-secondary-700/50 dark:text-secondary-300">
                {{ $repository['language'] }}
            </span>
            @endif
        </div>
    </a>
    @endforeach
    @else
    <div class="col-span-1 mt-4 text-center text-secondary-600 dark:text-secondary-400 sm:col-span-2 md:col-span-3">
        No repositories found.
    </div>
    @endif
</div>
@endif
@endif

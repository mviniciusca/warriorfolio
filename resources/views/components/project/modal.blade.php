@props(['project', 'is_section_filled_inverted'])

<!-- Main modal -->
<div id="{{ $project->id }}" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black/80 md:inset-0">
    <div class="relative max-h-full max-w-screen-lg mx-auto">
        <!-- Modal content -->
        <div
            class="relative rounded-lg {{ $is_section_filled_inverted ? 'bg-secondary-950 text-secondary-300 dark:bg-secondary-50 dark:text-secondary-950' : 'dark:bg-secondary-950 dark:text-white' }}">
            <!-- Modal body -->
            <div class="mb-4 space-y-4 p-12 my-12">
                <div class="flex items-end">
                    <button type="button"
                        class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-full bg-transparent text-sm text-secondary-400 hover:bg-secondary-200 hover:text-secondary-900 dark:hover:bg-secondary-600 dark:hover:text-white"
                        data-modal-hide="{{ $project->id }}">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">{{ __('Close modal') }}</span>
                    </button>
                </div>
                <div class="text-center" id="project-category">
                    <span class="rounded-md bg-primary-700 px-3 py-1 text-xs text-white">
                        {!! $project->category->name !!}
                    </span>
                </div>
                <div class="my-4 text-center text-lg font-semibold tracking-tight" id="project-title">
                    {{ $project->name }}
                </div>
                <div class="text-sm mx-auto my-4 max-w-2xl text-center" id="project-short-description">
                    {{ $project->short_description }}
                </div>
                <div class="project-content project-modal my-4 leading-loose text-sm" id="project-content">
                    {!! $project->content !!}
                </div>
                @if ($project->external_link)
                    <div id="external-link">
                        <button id="external-link" type="button" onclick="window.open('{{ $project->external_link }}');"
                            class="flex items-center gap-1 rounded-md border border-black border-opacity-40 bg-primary-500 px-3 py-2 text-sm text-secondary-50 transition-all duration-100 hover:opacity-80 active:opacity-70">
                            <ion-icon name="open-outline"></ion-icon>
                            <span>{{ __('Open Full Project') }}</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

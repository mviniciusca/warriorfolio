@props(['project', 'is_section_filled_inverted'])

<div id="{{ $project->id }}" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-auto max-h-auto w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black/90 md:inset-0">
    <div class="relative max-h-full w-full mx-auto my-auto">
        {{-- Close Button --}}
        <div class="w-full">
            <div class="flex w-full items-end p-4 order-2">
                <button type="button"
                    class="ms-auto inline-flex items-center justify-center rounded-full text-secondary-500"
                    data-modal-hide="{{ $project->id }}">
                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">{{ __('Close modal') }}</span>
                </button>
            </div>
        </div>
        {{-- Content --}}
        <div class="{{ $is_section_filled_inverted ? 'bg-secondary-900 text-secondary-300 dark:bg-secondary-50 dark:text-secondary-950' :
    'dark:bg-secondary-900 dark:text-white bg-secondary-50 relative' }} pb-12  rounded-2xl">
            {{-- Body --}}
            <div class="space-y-1 max-w-4xl px-24 mx-auto">
                <div class="text-center" id="project-category">
                    <div class="flex mx-auto gap-2 items-center justify-start">
                        <span
                            class="inline-flex items-center gap-2 bg-secondary-700 px-5 font-semibold mb-4 py-3 text-xs text-white dark:bg-secondary-50 dark:text-white"
                            style="background-color: {{ $project->category->hex_color ?? '#000' }};">
                            <x-ui.ionicon :icon="$project->category->icon ?? 'bookmark-sharp'" class="h-4 w-4" />
                            {!! $project->category->name !!}
                        </span>
                    </div>
                </div>
                <div class="text-xl font-semibold tracking-tight" id="project-title">
                    <div class=" mx-auto">{{ $project->name }}</div>
                </div>
                <div class="text-sm mx-auto" id="project-short-description">
                    <p>{{ $project->short_description }}</p>
                </div>
                <div class="project-content project-modal leading-loose text-sm" id="project-content">
                    <div class="mx-auto">{!! $project->content !!}</div>
                </div>
                @if ($project->external_link ?? false)
                    <div class="" id="external-link project-btn">
                        <a target="_blank" href="{{ $project->external_link }}">
                            <x-ui.button class="text-xs font-semibold" :$is_section_filled_inverted :style="'filled'"
                                :icon="'trending-up-outline'">
                                {{ __('See More') }}
                            </x-ui.button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

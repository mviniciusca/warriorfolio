@props(['project', 'is_section_filled_inverted' => null])

<div aria-hidden="true"
    class="max-h-auto fixed left-0 right-0 top-0 z-50 hidden h-auto w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black/90 md:inset-0"
    id="{{ $project->id }}" tabindex="-1">
    <div class="relative mx-auto my-auto max-h-full w-full">
        {{-- Close Button --}}
        <div class="w-full">
            <div class="order-2 flex w-full items-end p-4">
                <button class="ms-auto inline-flex items-center justify-center rounded-full text-secondary-500"
                    data-modal-hide="{{ $project->id }}" type="button">
                    <svg aria-hidden="true" class="h-4 w-4" fill="none" viewBox="0 0 14 14"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" stroke="currentColor" />
                    </svg>
                    <span class="sr-only">{{ __('Close modal') }}</span>
                </button>
            </div>
        </div>
        {{-- Content --}}
        <div
            class="{{ $is_section_filled_inverted
                ? 'bg-secondary-900 text-secondary-300 dark:bg-secondary-50 dark:text-secondary-950'
                : 'dark:bg-secondary-900 dark:text-white bg-secondary-50 relative' }} rounded-2xl pb-12">
            {{-- Body --}}
            <div class="mx-auto max-w-4xl space-y-1 px-24">
                <div class="text-center" id="project-category">
                    <div class="mx-auto flex items-center justify-start gap-2">
                        <span
                            class="mb-4 inline-flex items-center gap-2 bg-secondary-700 px-5 py-3 text-xs font-semibold text-white dark:bg-secondary-50 dark:text-white"
                            style="background-color: {{ $project->category->hex_color ?? '#000' }};">
                            <x-ui.ionicon :icon="$project->category->icon ?? 'bookmark-sharp'" class="h-4 w-4" />
                            {!! $project->category->name !!}
                        </span>
                    </div>
                </div>
                <div class="text-xl font-semibold tracking-tight" id="project-title">
                    <div class="mx-auto">{{ $project->name }}</div>
                </div>
                <div class="mx-auto text-sm" id="project-short-description">
                    <p>{{ $project->short_description }}</p>
                </div>
                <div class="project-content project-modal text-sm leading-loose" id="project-content">
                    <div class="mx-auto">{!! $project->content !!}</div>
                </div>
                @if ($project->external_link ?? false)
                    <div class="" id="external-link project-btn">
                        <a href="{{ $project->external_link }}" target="_blank">
                            <x-ui.button :$is_section_filled_inverted :icon="'trending-up-outline'" :style="'filled'"
                                class="text-xs font-semibold">
                                {{ __('See More') }}
                            </x-ui.button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

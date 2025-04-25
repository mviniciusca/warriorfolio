@props(['data', 'courses'])

<div class="mb-8">
    <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">About Me</h2>
    <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">Full-stack developer exploring the digital
        frontier</p>
</div>

<div class="grid gap-8 md:grid-cols-2">
    <!-- Bio Column -->
    <div class="space-y-6">
        <div>
            <h3 class="flex items-center gap-2 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                <x-ui.ionicon icon="rocket-outline" />
                bio
            </h3>
            <div
                class="mt-6 text-sm leading-relaxed text-secondary-600 dark:text-secondary-400 [&>p:first-child]:mt-0 [&>p]:mt-4">
                {!! $data->profile->about !!}
            </div>

            @if ($data->profile->is_downloadable && $data->profile->document)
                <div class="mt-6 flex justify-start">
                    <a href="{{ asset('storage/' . $data->profile->document) }}" target="_blank">
                        <x-ui.button :icon="'document-text-outline'" size='sm' style='outlined'>
                            {{ __('Download Resume') }}
                        </x-ui.button>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Education Timeline Column -->
    <div class="space-y-6">
        <div>
            <h3 class="flex items-center gap-2 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                <x-ui.ionicon icon="school-outline" />
                certifications & courses
            </h3>
        </div>
        <div class="relative mt-4">
            <!-- Linha vertical -->
            <div class="absolute bottom-2 left-0 top-2 w-px bg-secondary-200 dark:bg-secondary-800"></div>

            <div class="relative space-y-8 py-2">
                @forelse ($courses as $course)
                    <div class="relative pl-6">
                        <!-- Marcador circular -->
                        <div
                            class="absolute -left-[0.3125rem] top-[1.125rem] h-2.5 w-2.5 rounded-full border-2 border-secondary-200 bg-white dark:border-secondary-800 dark:bg-secondary-900">
                        </div>
                        <div class="flex-1">
                            <span class="text-xs font-medium text-secondary-500 dark:text-secondary-400">
                                {{ $course->start_date->format('m/Y') }} - {{ $course->end_date->format('m/Y') }}
                            </span>
                            <h3 class="mt-1 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                {{ $course->name }}
                            </h3>
                            <p class="mb-1 text-xs text-secondary-600 dark:text-secondary-400">
                                {{ $course->institution }}
                            </p>
                            <span @class([
                                'mt-0 -mx-2 inline-flex items-center rounded-lg px-2 py-0.5 text-xs font-medium',
                                $course->getStatusColor()['border'],
                                $course->getStatusColor()['text'],
                                $course->getStatusColor()['dark_border'],
                                $course->getStatusColor()['dark_text'],
                            ])>
                                <x-ui.ionicon :icon="$course->getStatusIcon()" class="mr-1" />
                                {{ $course->getStatusLabel() }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-sm text-secondary-600 dark:text-secondary-400">
                        {{ __('No courses added yet.') }}
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

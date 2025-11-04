@props(['data'])

<div class="relative mb-24" x-data="{
    viewMode: $persist('expanded').as('profileViewMode'),
    get isExpanded() { return this.viewMode === 'expanded' },
    get isCompact() { return this.viewMode === 'compact' },
    get isUltraCompact() { return this.viewMode === 'ultra-compact' },
    cycleView() {
        if (this.isUltraCompact) {
            this.viewMode = 'compact';
        } else if (this.isCompact) {
            this.viewMode = 'expanded';
        } else {
            this.viewMode = 'ultra-compact';
        }
    }
}">
    {{-- Toggle Button --}}
    <button @click="cycleView"
        class="absolute right-0 top-1/2 -translate-y-1/2 flex items-center justify-center w-8 h-8 text-secondary-600 hover:text-secondary-800 dark:text-secondary-400 dark:hover:text-secondary-200">
        <span>
            <template x-if="isExpanded">
                <svg class="toggle-icon rotate h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M5 12h14" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </template>
            <template x-if="!isExpanded && isCompact">
                <svg class="toggle-icon h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M12 5v14m-7-7h14" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </template>
            <template x-if="isUltraCompact">
                <svg class="toggle-icon h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M12 5v14m-7-7h14" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </template>
        </span>
    </button>

    {{-- Profile Expanded --}}
    <div x-show="isExpanded" x-transition:enter="fade-enter" x-transition:leave="fade-leave">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row md:items-start md:gap-8">
                @if ($showAvatar)
                <div class="relative mb-8 md:mb-0 md:w-1/3 flex justify-center md:justify-end">
                    <div class="relative">
                        @if ($data->profile->avatar)
                        <img alt="{{ $data->name }}"
                            class="relative h-32 w-32 md:h-32 md:w-32 rounded-full object-cover"
                            src="{{ asset('storage/' . $data->profile->avatar) }}" />
                        @else
                        <img alt="Default profile"
                            class="relative dark:invert h-32 w-32 md:h-32 md:w-32 rounded-full object-cover"
                            src="{{ asset('img/core/profile-picture.png') }}" />
                        @endif
                    </div>
                </div>
                @endif

                <div class="flex flex-col md:w-2/3">
                    <div class="text-center md:text-left">
                        @if ($showName)
                        <h2
                            class="mb-4 flex items-center justify-center md:justify-start gap-2 text-lg font-medium leading-tight">
                            <span>{{ $data->name }}</span>
                            @if ($data->profile->is_open_to_work)
                            <x-themes.juno.partials.badge>
                                {{ __('Open to Work') }}
                            </x-themes.juno.partials.badge>
                            @endif
                            @if($data->profile->is_downloadable && $data->profile->document)
                            <a target="_blank" href="{{ asset('storage/' . $data->profile->document) }}">
                                <x-themes.juno.partials.badge>
                                    {{ __('Download CV') }}
                                </x-themes.juno.partials.badge>
                            </a>
                            @endif
                        </h2>
                        @endif
                        <div
                            class="flex flex-col items-center md:items-start gap-y-2 text-sm text-secondary-600 dark:text-secondary-400">
                            @if ($showJobPosition && $data->profile->job_position && $showCompany &&
                            $data->profile->company)
                            <div class="flex items-center gap-2">
                                <x-ui.ionicon icon="briefcase-outline" />
                                <span>{{ $data->profile->job_position }} at {{ $data->profile->company }}</span>
                            </div>
                            @elseif ($showJobPosition && $data->profile->job_position)
                            <div class="flex items-center gap-2">
                                <x-ui.ionicon icon="briefcase-outline" />
                                <span>{{ $data->profile->job_position }}</span>
                            </div>
                            @elseif ($showCompany && $data->profile->company)
                            <div class="flex items-center gap-2">
                                <x-ui.ionicon icon="business-outline" />
                                <span>{{ $data->profile->company }}</span>
                            </div>
                            @endif

                            @if ($showLocation && $data->profile->localization)
                            <div class="flex items-center gap-2">
                                <x-ui.ionicon icon="location-outline" />
                                <span>{{ $data->profile->localization }}</span>
                            </div>
                            @endif

                            @if ($showEmail && $data->profile->public_email)
                            <div class="flex items-center gap-2">
                                <x-ui.ionicon icon="mail-outline" />
                                <a class="hover:text-secondary-800 dark:hover:text-secondary-200"
                                    href="mailto:{{ $data->profile->public_email }}">
                                    {{ $data->profile->public_email }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if ($showSocial)
                    <div class="mt-6 flex justify-center md:justify-start">
                        <x-ui.social-network justify="center md:start" size="default" />
                    </div>
                    @endif

                    @if ($showSkills && $data->profile->skills)
                    <div class="mt-6">
                        <div class="flex flex-wrap justify-center md:justify-start gap-1.5">
                            @foreach (explode(',', $data->profile->skills) as $skill)
                            <span
                                class="rounded-full border border-secondary-600 px-2 py-0.5 text-xs text-secondary-600 dark:border-secondary-700/50 dark:text-secondary-400">
                                {{ trim($skill) }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Compact View --}}
    <div x-show="isCompact" x-transition:enter="fade-enter" x-transition:leave="fade-leave">
        <div class="flex items-center gap-4 py-10">
            <div class="flex-shrink-0">
                @if ($data->profile->avatar)
                <img alt="{{ $data->name }}" class="h-20 w-20 rounded-full object-cover"
                    src="{{ asset('storage/' . $data->profile->avatar) }}" />
                @else
                <img alt="Default profile" class="dark:invert h-20 w-20 rounded-full object-cover"
                    src="{{ asset('img/core/profile-picture.png') }}" />
                @endif
            </div>
            <div class="flex flex-col justify-center">
                <h2 class="mb-0 flex items-center gap-2 text-lg font-medium leading-tight">
                    <span>{{ $data->name }}</span>
                    @if ($data->profile->is_open_to_work)
                    <x-themes.juno.partials.badge>
                        {{ __('Open to Work') }}
                    </x-themes.juno.partials.badge>
                    @endif
                </h2>
                <div class="text-sm text-secondary-600 dark:text-secondary-400">
                    @if ($showJobPosition && $data->profile->job_position && $showCompany && $data->profile->company)
                    <div class="flex items-center gap-2">
                        <x-ui.ionicon icon="briefcase-outline" />
                        <span>{{ $data->profile->job_position }} at {{ $data->profile->company }}</span>
                    </div>
                    @endif
                </div>
                @if ($showSocial)
                <div class="mt-2 flex justify-start">
                    <x-ui.social-network justify="start" size="default" />
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Ultra Compact View --}}
    <div x-show="isUltraCompact" x-transition:enter="fade-enter" x-transition:leave="fade-leave">
        <div class="flex flex-col py-4">
            <div class="flex items-center">
                <h2 class="mb-0 flex items-center gap-2 text-lg font-medium leading-tight">
                    <span>{{ $data->name }}</span>
                    @if ($data->profile->is_open_to_work)
                    <x-themes.juno.partials.badge>
                        {{ __('Open to Work') }}
                    </x-themes.juno.partials.badge>
                    @endif
                </h2>
            </div>
            @if ($showJobPosition && $data->profile->job_position)
            <div class="mt-1 flex items-center gap-2">
                <x-ui.ionicon icon="briefcase-outline" />
                <span class="text-sm text-secondary-600 dark:text-secondary-400">
                    {{ $data->profile->job_position }}
                    @if ($showCompany && $data->profile->company)
                    at {{ $data->profile->company }}
                    @endif
                </span>
            </div>
            @endif
        </div>
    </div>
</div>

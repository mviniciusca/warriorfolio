@props(['data'])

<div class="mx-auto max-w-2xl">
    {{-- Profile Header --}}
    <div class="flex flex-col items-center">
        @if ($showAvatar)
            <div class="relative mb-8">
                @if ($data->profile->is_open_to_work)
                    <div class="absolute -right-0.5 top-4 z-10">
                        <span class="flex h-3 w-3">
                            <span class="relative inline-flex h-3 w-3">
                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>
                                <span
                                    class="relative inline-flex h-3 w-3 rounded-full bg-green-500 ring-4 ring-green-400/70 ring-offset-2 dark:ring-green-400/50"></span>
                            </span>
                        </span>
                    </div>
                @endif
                <div class="relative">
                    {{-- Imagem do perfil sem borda --}}
                    @if ($data->profile->avatar)
                        <img alt="{{ $data->name }}" class="relative h-32 w-32 rounded-full object-cover"
                            src="{{ asset('storage/' . $data->profile->avatar) }}" />
                    @else
                        <img alt="Default profile" class="relative h-32 w-32 rounded-full object-cover"
                            src="{{ asset('img/core/profile-picture.png') }}" />
                    @endif
                </div>
            </div>
        @endif

        {{-- Nome e Status --}}
        <div class="text-center">
            @if ($showName)
                <div class="mb-2 flex items-center justify-center">
                    <h2 class="text-lg font-medium leading-tight">{{ $data->name }}</h2>
                </div>
            @endif
            <div
                class="flex flex-col items-center justify-center gap-y-2 text-sm text-secondary-600 dark:text-secondary-400">
                @if ($showJobPosition && $data->profile->job_position && $showCompany && $data->profile->company)
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
    </div>

    {{-- Social Network --}}
    @if ($showSocial)
        <div class="mt-8 flex justify-center">
            <x-ui.social-network justify="center" size="default" />
        </div>
    @endif

    {{-- Skills Grid --}}
    @if ($showSkills && $data->profile->skills)
        <div class="mx-auto mt-8 max-w-lg">
            <div class="flex flex-wrap justify-center gap-1.5">
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

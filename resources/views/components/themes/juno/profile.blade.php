@props(['data'])

<style>
    .rotate-toggle {
        transition: transform 0.3s ease;
    }

    .rotate-toggle.active {
        transform: rotate(180deg);
    }
</style>

<div class="relative mx-auto" x-data="{
    isOpen: $persist(true).as('profilePanelOpen'),
    toggleProfile() {
        this.isOpen = !this.isOpen;
    }
}">
    {{-- Toggle Button --}}
    <button @click="toggleProfile"
        class="absolute right-0 top-1/2 -translate-y-1/2 p-2 text-secondary-600 hover:text-secondary-800 dark:text-secondary-400 dark:hover:text-secondary-200">
        <span>
            <template x-if="isOpen">
                <svg class="animate__animated animate__flipInX h-5 w-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path d="M5 12h14" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </template>
            <template x-if="!isOpen">
                <svg class="animate__animated animate__flipInX h-5 w-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path d="M12 5v14m-7-7h14" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </template>
        </span>
    </button>

    {{-- Profile Expanded --}}
    <div x-show="isOpen">
        {{-- Profile Header --}}
        <div class="flex flex-col items-center">
            @if ($showAvatar)
                <div class="relative mb-8">
                    <div class="relative">
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
                    <div class="mb-2 flex items-center justify-center gap-2">
                        <h2 class="text-lg font-medium leading-tight">{{ $data->name }}</h2>
                        @if ($data->profile->is_open_to_work)
                            <span
                                class="inline-flex items-center rounded bg-secondary-100 px-2 py-0.5 text-xs font-semibold text-secondary-700 dark:bg-secondary-800 dark:text-secondary-200"
                                id="open-to-work-expanded">Open to Work</span>
                        @endif
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

    {{-- Compact View --}}
    <div x-show="!isOpen" x-transition:enter-end="profile-compact" x-transition:enter-start="profile-compact hidden"
        x-transition:enter="profile-transition" x-transition:leave-end="profile-compact hidden"
        x-transition:leave-start="profile-compact" x-transition:leave="profile-transition">
        <div class="flex items-center gap-4 py-10">
            <div class="flex-shrink-0">
                @if ($data->profile->avatar)
                    <img alt="{{ $data->name }}" class="h-20 w-20 rounded-lg object-cover"
                        src="{{ asset('storage/' . $data->profile->avatar) }}" />
                @else
                    <img alt="Default profile" class="h-20 w-20 rounded-lg object-cover"
                        src="{{ asset('img/core/profile-picture.png') }}" />
                @endif
            </div>
            <div class="flex flex-col justify-center">
                <div class="flex items-center gap-2">
                    <h2 class="mb-0 text-lg font-medium leading-tight">{{ $data->name }}</h2>
                    @if ($data->profile->is_open_to_work)
                        <span
                            class="inline-flex items-center rounded bg-secondary-100 px-2 py-0.5 text-xs font-semibold text-secondary-700 dark:bg-secondary-800 dark:text-secondary-200"
                            id="open-to-work-compact">Open to Work</span>
                    @endif
                </div>
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
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Link LinkedIn nos badges Open to Work
        function updateOpenToWorkBadges() {
            const socialNetworks = document.querySelectorAll('[data-linkedin]');
            let linkedinUrl = null;

            // Procura em todos os componentes de redes sociais pelo LinkedIn
            socialNetworks.forEach(social => {
                const url = social.getAttribute('data-linkedin');
                if (url && url !== 'null' && url !== '') {
                    linkedinUrl = url;
                }
            });

            // Se encontrou um LinkedIn, atualiza os badges
            if (linkedinUrl) {
                const badges = [
                    document.getElementById('open-to-work-expanded'),
                    document.getElementById('open-to-work-compact')
                ];

                badges.forEach(badge => {
                    if (badge && badge.textContent.includes('Open to Work')) {
                        const a = document.createElement('a');
                        a.href = linkedinUrl;
                        a.target = '_blank';
                        a.rel = 'noopener noreferrer';
                        a.className = badge.className + ' hover:underline';
                        a.textContent = badge.textContent;
                        badge.replaceWith(a);
                    }
                });
            }
        }

        setTimeout(updateOpenToWorkBadges, 100);
    });
</script>

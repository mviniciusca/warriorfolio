@props(['data'])

<div class="{{ $containerClass }}">
    {{-- Avatar e Nome --}}
    <div class="flex flex-col items-center">
        @if ($showAvatar)
            @if ($data->profile->avatar)
                <img alt="{{ $data->name }}" class="{{ $avatarClass }}"
                    src="{{ asset('storage/' . $data->profile->avatar) }}" />
            @else
                <img alt="Default profile" class="{{ $avatarClass }}" src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
        @endif

        <div class="text-center">
            @if ($showName)
                <h2 class="{{ $nameClass }}">{{ $data->name }}</h2>
            @endif
            @if ($showJobPosition && $data->profile->job_position)
                <p class="{{ $jobPositionClass }}">{{ $data->profile->job_position }}</p>
            @endif
        </div>
    </div>

    {{-- Informações do Perfil --}}
    @if ($showCompany || $showLocation || $showEmail)
        <div class="{{ $infoContainerClass }} mt-6 flex flex-col items-center">
            @if ($showCompany && $data->profile->company)
                <div class="{{ $infoItemClass }}">
                    <x-ui.ionicon icon="business-outline" />
                    <span>{{ $data->profile->company }}</span>
                </div>
            @endif

            @if ($showLocation && $data->profile->localization)
                <div class="{{ $infoItemClass }}">
                    <x-ui.ionicon icon="location-outline" />
                    <span>{{ $data->profile->localization }}</span>
                </div>
            @endif

            @if ($showEmail && $data->profile->public_email)
                <div class="{{ $infoItemClass }}">
                    <x-ui.ionicon icon="mail-outline" />
                    <a href="mailto:{{ $data->profile->public_email }}">
                        {{ $data->profile->public_email }}
                    </a>
                </div>
            @endif
        </div>
    @endif

    {{-- Skills/Stacks --}}
    @if ($showSkills && $data->profile->skills)
        <div class="{{ $skillsContainerClass }} mt-6 text-center">
            <div class="flex flex-wrap justify-center gap-2">
                @foreach (explode(',', $data->profile->skills) as $skill)
                    <span class="{{ $skillItemClass }}">
                        {{ trim($skill) }}
                    </span>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Redes Sociais --}}
    @if ($showSocial)
        <div class="{{ $socialContainerClass }} mt-6 flex justify-center">
            <x-ui.social-network justify="center" />
        </div>
    @endif

    {{-- Download CV se disponível --}}
    @if ($showResume && $data->profile->is_downloadable && $data->profile->document)
        <div class="mt-6 flex justify-center">
            <a class="{{ $downloadButtonClass }}" href="{{ asset('storage/' . $data->profile->document) }}"
                target="_blank">
                <x-ui.ionicon icon="download-outline" />
                <span>Download CV</span>
            </a>
        </div>
    @endif
</div>

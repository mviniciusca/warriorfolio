@props(['profile', 'skills'])

<div class="grid grid-rows-1 justify-center text-center gap-4">

    {{-- Profile Picture --}}
    <div class="bg-zinc-900 h-44 w-44 rounded-full flex mx-auto items-center justify-center mb-4">
        {{-- Profile Picture from Database --}}
        @if ($profile->picture !== null)
            <x-curator-glider :media='$profile->picture' class="rounded-full mx-auto my-auto"/>
        {{-- Default Profile Picture --}}
        @else
            <img src="{{ asset('/img/logo-white.png') }}" alt="Profile Picture" class="p-10 mx-auto my-auto">
        @endif
    </div>
    {{-- End Profile Picture --}}
    {{-- Profile Title --}}
     <div class="grid gap-2 justify-center items-center">
         <p class="text-md">{{ $profile->name}}</p>
         <p class="text-sm">{{ $profile->localization }}</p>
         <p class="text-xs pb-3">{{ $profile->job_position }}</p>
         {{-- Skills --}}
         <div>
            @foreach ($skills as $skill)
                    <!-- Iterates over each item in the skill array -->
                    @foreach ($skill as $item)
                        <!-- Renders the skill component for each item -->
                        <x-ui.skill :skill="$item"/>
                    @endforeach
            @endforeach
        </div>
         {{-- End Skills --}}
         {{-- Social Network --}}
         <div class="mt-2 gap-3 justify-center">
            <x-ui.social-network :profile='$profile' />
         </div>
         {{-- End Social Network --}}
    </div>
    {{-- End Profile Title --}}

</div>

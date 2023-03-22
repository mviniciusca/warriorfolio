<div class="grid grid-rows-1 justify-center text-center gap-4">

    {{-- Profile Picture --}}
    <div class="bg-zinc-900 h-44 w-44 rounded-full flex mx-auto items-center justify-center">
        {{-- Profile Picture from Database --}}
        @if ($profile->profile_picture !== null)
            <x-curator-glider :media='$profile->profile_picture' class="rounded-full mx-auto my-auto"/>
        {{-- Default Profile Picture --}}
        @else
            <img src="{{ asset('/img/app-logo.png') }}" alt="Profile Picture" class="p-10 mx-auto my-auto">
        @endif
    </div>
    {{-- End Profile Picture --}}
    {{-- Profile Title --}}
     <div class="grid gap-2 justify-center items-center">
         <p class="text-md">{{ $profile->profile_title}}</p>
         <p class="text-xs">Fullstack Developer</p>
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
    </div>
    {{-- End Profile Title --}}

</div>

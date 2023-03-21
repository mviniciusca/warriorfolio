{{-- About Me Section: This section will show informations about you, your courses and your public picture --}}
<x-content-section
    :nav_id="'about'"
    :title='$about_title'
    :subTitle='$about_description'
>

<div class="grid gap-4 md:grid-cols-3 md:gap-12 lg:gap-24 items-start">

{{-- Profile Picutre--}}
    <div class="w-full flex items-center justify-center">

       @if ($profile->profile_picture !== null)
            <x-curator-glider :media="$profile->profile_picture" class="rounded-full w-1/2 md:w-full p-4 -mt-4 md:p-6 lg:p-16 lg:-mt-10 filter grayscale"/>
       @else
           <img src="{{ asset('/img/logo-white.png') }}" class="w-1/2 md:w-full p-4 -mt-4 md:p-6 lg:p-16 lg:-mt-10 filter opacity-90"/>
       @endif

    </div>

{{--About Me Section--}}
    <div class="leading-relaxed p-8 md:p-2 text-zinc-400 text-md sm:text-sm md:text-md md:leading-snug lg:text-base lg:leading-loose">
        {{ $profile->about_me }}

        {{-- Empty Section --}}
        @if ($profile->about_me === null)
            <x-ui.empty-section
                :btn_icon="'add-outline'"
                :btn_text="'Add About Me'"
                :empty_message="'You have no about me yet'"
                :empty_icon="'reader-outline'"
                :link_path="'/admin/profiles/create'"
            />
        @endif

    </div>

{{--Timeline Courses --}}
    <div class="grid justify-center">

        @if($courses->count() !== 0)

        {{-- Timeline Title --}}
        <span class="pb-8 text-2xl lg:text-3xl font-extrabold tracking-tight text-zinc-500">
            <span>recent</span>
            <span class="main-gradient-text">certifications</span>
        </span>

        @endif

        {{-- Timeline Listing --}}
        <div class="grid items-stretch">
            @foreach ($courses as $item )
                <x-ui.timeline
                :course="$item->course"
                :university="$item->university"
                :conclusion_date="$item->conclusion_date"
                />
            @endforeach
        </div>

        {{-- Empty Section --}}
        @if ($courses->count() === 0)
            <x-ui.empty-section
                :btn_icon="'add-outline'"
                :btn_text="'Add Course'"
                :empty_message="'You have no courses yet'"
                :empty_icon="'school-outline'"
                :link_path="'/admin/timelines/create'"
            />
        @endif

    </div>

</div>
</x-content-section>


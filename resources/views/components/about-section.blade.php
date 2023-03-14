<x-content-section
:title='$about_title'
:subTitle='$about_description'
>

<div class="grid gap-4 md:grid-cols-3 md:gap-12 lg:gap-24 items-start ">

{{-- Profile Picutre--}}
    <div class="w-full flex items-center justify-center">
        <x-curator-glider :media="$profile->profile_picture" class="rounded-full w-1/2 md:w-full md:p-6 lg:p-8 filter grayscale"/>
    </div>

{{--About Me Section--}}
    <div class="leading-relaxed p-8 md:p-2 text-zinc-400 text-md sm:text-sm md:text-md md:leading-snug lg:text-base lg:leading-loose">
        {{ $profile->about_me }}
    </div>

{{--Timeline Courses --}}
    <div class="grid justify-center">

        <span class="pb-8 text-2xl lg:text-3xl font-extrabold tracking-tight text-zinc-500">recent
            <span class="bg-gradient-to-r from-orange-400 to-pink-500 bg-clip-text text-transparent">certifications</span>
        </span>

        <div class="grid items-stretch">
            @foreach ($courses as $item )
                <x-ui.timeline
                :course="$item->course"
                :university="$item->university"
                :conclusion_date="$item->conclusion_date"
                />
            @endforeach
        </div>


    </div>


</div>
</x-content-section>


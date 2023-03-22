{{-- About Me Section: This section will show informations about you, your courses and your public picture --}}
<x-content-section
    :nav_id="'about'"
    :skills='$skills'
    :title='$about->about_title'
    :subTitle='$about->about_description'
>

<div class="grid gap-8 lg:flex lg:gap-16 items-start md:grid-cols-1">
    {{-- Profile --}}
    <div class="lg:w-1/3 p-4">
        <x-about.profile :profile='$profile' :skills='$skills' />
    </div>
    <div class="lg:flex lg:gap-16 grid gap-8">
        {{-- Bio --}}
        <div class="w-full lg:w-1/2 p-4">
            <x-about.bio :profile='$profile' />
        </div>
        {{-- Courses --}}
        <div class="w-full lg:w-1/2 p-4">
            <x-about.courses :courses='$courses' />
        </div>
    </div>
</div>
</x-content-section>

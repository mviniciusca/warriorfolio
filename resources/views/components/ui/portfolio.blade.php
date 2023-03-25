@props(['tag' => '', 'link' => '', 'cover' => ''])

<div class="p-3 transition-all duration-300 hover:-translate-y-3 lg:py-8">
    <div class="absolute z-10 -ml-4 mt-8 text-sm font-semibold text-white">
        @if ($tag)
            <x-portfolio.tag :tag="$tag" :link="$link" />
        @endif
    </div>
    <div id="project-cover">
        <img class="rounded-xl opacity-80 transition-all duration-200 ease-in-out hover:opacity-100"
            <x-curator-glider :media="$cover" class="rounded-xl" />
    </div>
</div>

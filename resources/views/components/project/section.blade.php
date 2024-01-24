<x-core.layout>
    @if($info->portfolio_section_title)
    <div class="header-title mb-2">{!! $info->portfolio_section_title !!}</div>
    @endif
    @if($info->portfolio_section_subtitle_text)
    <div class="text-center text-lg max-w-2xl mt-4 mx-auto">{!! $info->portfolio_section_subtitle_text !!}</div>
    @endif
    <section class="mt-24">
        <div class="container max-w-7xl px-5 mx-auto">
            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                @foreach ($projects as $project )
                <div
                    class="p-8 md:w-1/4 sm:mb-0 mb-0 filter opacity-20 transition-all duration-100  grayscale invert-0  hover:filter-none hover:opacity-100">
                    <div class="overflow-hidden p-2 rounded-xl">
                        <img alt="content" class="object-cover rounded-xl  object-center w-full "
                            src="{{ asset('storage/' . $project->image_cover) }}">
                        <div class="flex justify-between mt-4 text-sm">
                            <p class="opacity-100">{{ $project->name }}</p>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-core.layout>

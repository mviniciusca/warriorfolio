@if($module->portfolio)
<x-core.layout class="{{ $info->portfolio_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : '' }}"
    id="portfolio">
    @if($info->portfolio_section_title)
    <div class=" header-title mb-2">{!! $info->portfolio_section_title !!}</div>
    @endif
    @if($info->portfolio_section_subtitle_text)
    <div class="text-center text-lg max-w-2xl mt-4 mx-auto">{!! $info->portfolio_section_subtitle_text !!}</div>
    @endif
    <section class="mt-24">
        <div class="container max-w-7xl px-5 mx-auto">
            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                @foreach ($projects as $project )
                <div data-modal-target="{{ $project->id }}" data-modal-toggle="{{ $project->id }}"
                    class="lg:p-4 lg:w-1/4 sm:mb-0 mb-0 filter opacity-90 transition-all duration-100">
                    <div
                        class="p-2 rounded-lg mt-4 bg-secondary-400 bg-opacity-10 cursor-pointer opacity-80 transition-all duration-100 hover:opacity-100 hover:mt-2 pb-4">
                        <img alt="{{ $project->name }} - picture"
                            class="object-cover -mt-8 rounded-xl object-center w-full" @if($project->slug !=
                        'warriorfolio-v2')
                        src="{{ asset('storage/' . $project->image_cover) }}
                        @else
                        src="{{ asset('img/core/project-cover-demo.png') }}
                        @endif

                        ">
                        <div class="flex justify-between mt-4 text-sm">
                            <p class="opacity-100 font-medium">{{ $project->name }}</p>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <x-project.modal :project='$project' />
                @endforeach
            </div>
        </div>
    </section>
</x-core.layout>
@endif
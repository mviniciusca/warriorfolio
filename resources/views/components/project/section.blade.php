@if($module->portfolio)
<x-core.layout class="{{ $info->portfolio_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : '' }}"
    id="portfolio">

    @if($info->portfolio_section_title)
    <x-slot name="module_title">
        {!! $info->portfolio_section_title !!}
    </x-slot>
    @endif

    @if($info->portfolio_section_subtitle_text)
    <x-slot name="module_subtitle">
        {!! $info->portfolio_section_subtitle_text !!}
    </x-slot>
    @endif

    <section class="mt-20">
        <div class="container mx-auto max-w-7xl px-5">
            <div class="-mx-4 -mb-10 -mt-4 flex flex-wrap sm:-m-4">
                @foreach ($projects as $project )
                <div data-modal-target="{{ $project->id }}" data-modal-toggle="{{ $project->id }}"
                    class="mb-0 opacity-90 filter transition-all duration-100 sm:mb-0 lg:w-1/4 lg:p-4">
                    <div
                        class="mt-4 cursor-pointer rounded-lg bg-secondary-400 bg-opacity-10 p-2 pb-4 opacity-80 transition-all duration-100 hover:opacity-100">
                        <img alt="{{ $project->name }} - picture"
                            class="-mt-8 w-full rounded-xl object-cover object-center"
                            src="{{ asset('storage/' . $project->image_cover) }}">
                        <div class="mt-4 flex justify-between text-sm">
                            <p class="font-medium opacity-100">{{ $project->name }}</p>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <x-project.modal :project='$project' />
                @endforeach
            </div>
        </div>
    </section>

    @if($projects->count() === 0)
    <x-ui.empty-section :auth="'Go to your Dashboard and create a New Project.'" />
    @endif

</x-core.layout>
@endif

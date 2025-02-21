@if ($module->portfolio)

    <x-core.layout class="{{ data_get($data, 'portfolio.section_fill') ? 'section-filled' : null }}" id="portfolio">

        @if ($data->portfolio['section_title'])
            <x-slot name="module_title">
                {!! $data->portfolio['section_title'] !!}
            </x-slot>
        @endif

        @if ($data->portfolio['section_subtitle'])
            <x-slot name="module_subtitle">
                {!! $data->portfolio['section_subtitle'] !!}
            </x-slot>
        @endif

        <section class="mt-20">
            <div class="container mx-auto max-w-7xl px-5">
                <div class="flex w-full flex-wrap content-center justify-start">
                    @foreach ($projects as $project)
                        <div data-modal-target="{{ $project->id }}" data-modal-toggle="{{ $project->id }}"
                            class="{{ $project->content ? 'cursor-pointer' : 'cursor-auto' }} w-1/2 p-2 sm:w-1/2 md:w-1/3 lg:w-1/4">

                            <div class="tag {{ $project->category->color ? '' : 'bg-primary-600' }} absolute ml-2 mt-2 flex flex-wrap items-center gap-1 rounded-md px-3 py-1 text-xs font-bold text-white"
                                style="background-color: {{ $project->category->hex_color }}">

                                @if ($project->category->icon)
                                    <x-ui.ionicon :icon="$project->category->icon" />
                                @else
                                    <x-ui.ionicon :icon="'bookmark-outline'" />
                                @endif

                                {{ $project->category->name }}

                            </div>

                            <x-curator-glider
                                class="mx-auto h-40 w-full rounded-xl object-cover object-center sm:h-48 md:h-52 lg:h-60"
                                :media="$project->image_cover" />

                            <div class="mt-4 flex flex-col justify-between gap-2 pb-4 text-xs">
                                <p class="font-medium opacity-100">{{ $project->name }}</p>

                                @if ($project->content)
                                    <span class="flex items-center font-semibold hover:text-primary-500">
                                        {{ __('See Full Project') }}
                                        <x-ui.ionicon :icon="'chevron-forward-outline'" />
                                    </span>
                                @endif

                            </div>
                        </div>

                        @if ($project->content)
                            <x-project.modal :project='$project' />
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        @if ($projects->count() === 0)
            <x-ui.empty-section :auth="__('Go to your Dashboard and create a New Project.')" />
        @endif

    </x-core.layout>
@endif

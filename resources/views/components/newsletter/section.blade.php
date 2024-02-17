@if($module->newsletter)
<x-core.layout>
    <div class="mx-auto w-full px-4">
        <div
            class="flex flex-wrap items-center justify-center rounded-lg border border-secondary-300 bg-secondary-50 px-4 py-6 text-center dark:border-secondary-800 dark:bg-secondary-950 lg:py-8">
            <div class="image w-full px-4 lg:w-1/4">
                <img class="mx-auto max-h-48"
                    src="{{ $info->newsletter_section_image ? asset('storage/' . $info->newsletter_section_image) : asset('img/core/svg/developer.svg') }}"
                    alt="newsletter-image" />
            </div>
            <div class="text w-full p-4 lg:w-2/4">
                <span class="text-2xl font-bold leading-tight tracking-tighter md:text-4xl lg:text-5xl">
                    <p>
                        {!! $info->newsletter_section_title !!}
                    </p>
                    <p class="text-xs font-normal tracking-normal md:text-sm">
                        {!! $info->newsletter_section_subtitle_text !!}
                    </p>
                </span>
            </div>
            <div class="form mx-auto flex w-full flex-wrap justify-center p-4 lg:w-1/4">
                <livewire:newsletter :buttonText='$info->newsletter_section_button_text'>
            </div>
        </div>
    </div>
</x-core.layout>
@endif

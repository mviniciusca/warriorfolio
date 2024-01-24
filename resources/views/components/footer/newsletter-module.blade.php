<div class="container mx-auto">
    <div
        class="mx-auto border border-opacity-40 border-secondary-500 grid lg:flex gap-8 py-8 px-8 bg-secondary-50 dark:bg-secondary-950 items-center justify-center lg:justify-between rounded-xl">
        <img class="h-48"
            src="{{ $info->newsletter_section_image ? asset('storage/' . $info->newsletter_section_image) : asset('img/SVG/developer.svg') }}"
            alt="developer guy image" class="w-32 h-48 mx-auto" />
        <span class="text-5xl font-extrabold leading-tight tracking-tighter">
            {!! $info->newsletter_section_title !!}
            <p class="text-sm tracking-normal font-normal">
                {!! $info->newsletter_section_subtitle_text !!}
            </p>
        </span>
        <div>
            <livewire:newsletter :buttonText='$info->newsletter_section_button_text'>
        </div>
    </div>
</div>

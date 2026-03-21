<div class="space-y-8 sm:space-y-12">
    <x-themes.common.profile :centered="true" />

    <x-blog.widget.counter />

    <div class="saturn-bg-accent rounded-lg saturn-text border saturn-border-accent p-6 space-y-4 sm:p-10 lg:p-12">
        <h1 class="saturn-h5 saturn-text mb-6 flex items-center justify-between sm:mb-8">
            {{ __('Newsletter') }}
            <x-ui.ionicon icon="mail-outline" />
        </h1>
        <p class="text-sm opacity-70">{!! __('Join our
            newsletter and stay updated with the latest articles, tips, and resources for Laravel and
            development.')
            !!}</p>
        @livewire('newsletter', ['is_section_filled_inverted' => true])
        <p class="text-xs">{{ __('We hate spam!') }}</p>
    </div>
</div>

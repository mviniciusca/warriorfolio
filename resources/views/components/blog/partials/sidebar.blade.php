<div class="space-y-6 sm:space-y-10 md:space-y-12">
    <x-themes.common.profile :centered="true" />

    <x-blog.widget.counter />

    <div
        class="space-y-3 rounded-lg border saturn-border-accent saturn-bg-accent saturn-text p-4 sm:space-y-4 sm:p-8 lg:p-12">
        <h1 class="mb-4 flex items-center justify-between text-sm font-medium saturn-text sm:mb-6 sm:text-base md:mb-8">
            {{ __('Newsletter') }}
            <x-ui.ionicon icon="mail-outline" class="h-4 w-4 shrink-0 opacity-90 sm:h-5 sm:w-5" />
        </h1>
        <p class="text-xs opacity-70 sm:text-sm">{!! __('Join our
            newsletter and stay updated with the latest articles, tips, and resources for Laravel and
            development.')
            !!}</p>
        @livewire('newsletter', ['is_section_filled_inverted' => true])
        <p class="text-xs">{{ __('We hate spam!') }}</p>
    </div>
</div>

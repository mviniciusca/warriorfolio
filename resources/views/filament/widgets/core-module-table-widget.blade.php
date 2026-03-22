<x-filament-widgets::widget class="fi-wi-table scroll-mt-10" id="pulse-core-modules">
    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Widgets\View\WidgetsRenderHook::TABLE_WIDGET_START, scopes: static::class) }}

    {{-- One outline: borda neutra, sem ring/sombra; no escuro fundo transparente (alinhado ao fi-main). --}}
    <div class="pulse-core-module-card overflow-hidden">
        <div
            class="flex flex-wrap items-start justify-between gap-3 border-b border-neutral-200 px-4 py-3 dark:border-neutral-800 sm:gap-4 sm:px-6"
        >
            <div class="flex min-w-0 flex-1 gap-3 sm:gap-4">
                <x-filament::icon
                    icon="heroicon-o-cpu-chip"
                    class="h-8 w-8 shrink-0 text-neutral-600 dark:text-neutral-400 sm:h-9 sm:w-9"
                />
                <div class="min-w-0 space-y-1">
                    <h3 class="text-base font-semibold text-neutral-950 dark:text-white">
                        {{ __('Module visibility') }}
                    </h3>
                    <p class="text-sm leading-relaxed text-neutral-500 dark:text-neutral-400">
                        {{ __('Toggle which sections appear on the public site. Layout slots stay fixed—this is not per-page.') }}
                    </p>
                </div>
            </div>

            @if ($coreSettingsUrl)
                <a
                    wire:navigate
                    href="{{ $coreSettingsUrl }}"
                    class="inline-flex shrink-0 items-center gap-1 rounded-md border border-neutral-200 bg-transparent px-2.5 py-1.5 text-xs font-medium text-neutral-700 transition hover:bg-neutral-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-neutral-400 focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:border-neutral-700 dark:text-neutral-200 dark:hover:bg-neutral-900/60 dark:focus-visible:ring-neutral-500 dark:focus-visible:ring-offset-neutral-950"
                >
                    <x-filament::icon icon="heroicon-o-arrow-up-right" class="h-4 w-4" />
                    {{ __('Settings') }}
                </a>
            @endif
        </div>

        <div>
            {{ $this->table }}
        </div>
    </div>

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\Widgets\View\WidgetsRenderHook::TABLE_WIDGET_END, scopes: static::class) }}
</x-filament-widgets::widget>

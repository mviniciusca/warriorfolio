<header class="fi-header flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
    <div class="min-w-0 flex-1">
        @if (count($breadcrumbs))
            <x-filament::breadcrumbs
                :breadcrumbs="$breadcrumbs"
                class="hidden sm:block"
            />
        @endif
    </div>

    <div class="flex shrink-0 items-center gap-3">
        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_HEADER_ACTIONS_BEFORE, scopes: $renderHookScopes) }}

        @if (count($actions))
            <x-filament::actions :actions="$actions" />
        @endif

        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_HEADER_ACTIONS_AFTER, scopes: $renderHookScopes) }}
    </div>
</header>

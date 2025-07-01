@props([
'navigation' => null,
'is_menu_highlighted' => null,
'primary_navigation' => null,
'secondary_navigation' => null,
])

{{-- Navigation Primary and Mobile Navigation --}}
@if($primary_navigation ?? false)
<nav class="navigation text-sm absolute z-50 min-w-40 items-center rounded-lg border saturn-border backdrop-blur-md p-3 shadow-lg saturn-bg lg:flex lg:w-auto lg:flex-wrap lg:rounded-none lg:border-none lg:bg-transparent lg:backdrop-blur-none lg:p-0 lg:shadow-none dark:lg:bg-transparent"
    id="navigation-header">
    @if ($navigation)
    {{-- Primary Navigation --}}
    <div class="flex flex-col gap-2 lg:flex-row lg:gap-4">
        @foreach ($navigation as $index => $key)
        @if ($key['is_active'] && (!$key['is_secondary'] ?? null))
        <x-ui.nav-link :$is_menu_highlighted :text="$key['name']" :href="$key['url']" :target="$key['target']" />
        @endif
        @endforeach
    </div>

    {{-- Secondary Navigation - Only visible on mobile within this container --}}
    <div class="flex flex-col gap-2 mt-3 lg:hidden">
        @foreach ($navigation as $index => $key)
        @if ($key['is_active'] && ($key['is_secondary'] ?? null))
        <x-ui.nav-link :$is_menu_highlighted :text="$key['name']" :href="$key['url']" :target="$key['target']" />
        @endif
        @endforeach
    </div>
    @endif
</nav>
@endif
{{-- Navigation Secondary - Only visible on desktop --}}
@if($secondary_navigation ?? false)
<nav class="secondary-navigation hidden lg:flex flex-wrap gap-3 text-sm mt-4 lg:mt-0" id="navigation-header-secondary">
    @if ($navigation)
    <div class="flex flex-col gap-2 lg:flex-row lg:gap-3">
        @foreach ($navigation as $index => $key)
        @if ($key['is_active'] && ($key['is_secondary'] ?? null))
        <x-ui.nav-link :$is_menu_highlighted :text="$key['name']" :href="$key['url']" :target="$key['target']" />
        @endif
        @endforeach
    </div>
    @endif
</nav>
@endif

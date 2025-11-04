@if ($link)
<a class="cursor-pointer transition-all duration-300 hover:opacity-50 active:opacity-10" href="{{ $link }}">
    @endif
    {{-- Logo --}}
    @if (($logo ?? null) || ($logoDark ?? null))
    <x-curator-glider :media="$logo"
        class="{{ $logoSize ? $logoSize : 'max-w-11' }} {{ $logoDark ? 'dark:hidden' : '' }} block object-contain" />
    <x-curator-glider :media="$logoDark"
        class="{{ $logoSize ? $logoSize : 'max-w-11' }} hidden object-contain dark:block" />
    @else
    {{-- Default Logo --}}
    <svg width="107" class="{{ $size ?? 'h-8' }} mx-auto w-auto fill-saturn-600 dark:fill-white" height="107"
        viewBox="0 0 107 107" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M106.17 0L67.41 37.48L76.76 46.9L94.59 28.95V70.6L44.42 23.66L35.42 33.42L54.34 51.13L31.45 74.19V64.65L31.39 64.71L18.22 51.54V106.35L64.04 60.2L106.17 106.35V0Z" />
        <path d="M0 27.74V106.35H13.22V43.35L0 27.74Z" />
    </svg>
    {{-- End Default Logo --}}
    @endif
    @if ($link)
</a>
@endif

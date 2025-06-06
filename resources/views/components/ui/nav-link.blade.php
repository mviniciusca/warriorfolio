@props(['href' => '#', 'text' => '', 'target' => null, 'is_menu_highlighted' => false])

<a href="{{ $href }}" target="{{ $target ? '_blank' : '_self' }}" class="group inline-flex items-center gap-1.5 px-2 py-1.5 text-gray-700 transition-all duration-200 ease-in-out hover:text-gray-900 dark:text-gray-300 dark:hover:text-white
          {{ ($is_menu_highlighted ?? false) ? 'text-gray-900 dark:text-white font-medium' : '' }}">
    <span class="relative">
        {!! $text !!}
        <span
            class="absolute -bottom-1 left-0 h-0.5 w-0 bg-current transition-all duration-200 group-hover:w-full"></span>
    </span>
    @if ($target)
    <ion-icon class="h-3.5 w-3.5 opacity-60 transition-opacity group-hover:opacity-100" name="trending-up-outline">
    </ion-icon>
    @endif
</a>

@props(['href' => '#', 'text' => '', 'target' => '_self'])

<a href="{{ $href }}" target="{{ $target }}">
    <button
        class="mx-2 flex cursor-pointer flex-wrap items-center gap-1 text-sm font-bold transition-all duration-100 hover:border-b-4 hover:border-b-primary-600 hover:py-1 hover:font-bold hover:text-primary-600 hover:opacity-95 active:opacity-50 dark:hover:text-primary-500">
        {{ $text }}
        @if($target == '_blank')
        <ion-icon class="h-5 w-5" name="trending-up-outline"></ion-icon>
        @endif
    </button>
</a>

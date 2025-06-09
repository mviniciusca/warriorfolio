@props([
'src',
'alt' => '',
'class' => '',
'placeholderClass' => '',
'showPlaceholder' => true,
'lazy' => true,
'animated' => true,
'rounded' => 'rounded-lg'
])

<div {{ $attributes->merge(['class' => 'relative overflow-hidden ' . $rounded]) }}
    x-data="imageLoader()"
    x-init="init()">

    {{-- Placeholder (shown while image loads) --}}
    @if($showPlaceholder)
    <div x-show="loading" x-transition:leave="transition-opacity duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute inset-0 {{ $placeholderClass ?: 'saturn-bg-accent border saturn-border-accent' }} {{ $animated ? 'animate-pulse' : '' }} flex items-center justify-center">
        <div class="flex flex-col items-center gap-3">
            <svg class="w-12 h-12 saturn-text-accent opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2z" />
            </svg>
            <span class="text-xs saturn-text-accent opacity-40 font-medium">{{ __('Loading...') }}</span>
        </div>
    </div>
    @endif

    {{-- Error State --}}
    <div x-show="error" x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        class="absolute inset-0 bg-secondary-100 dark:bg-secondary-800 flex items-center justify-center {{ $rounded }}">
        <div class="text-center text-secondary-500 dark:text-secondary-400">
            <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
            </svg>
            <p class="text-xs">{{ __('Image not found') }}</p>
        </div>
    </div>

    {{-- Actual Image --}}
    <img x-ref="image" x-show="loaded && !error" x-transition:enter="transition-opacity duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" src="{{ $src }}" alt="{{ $alt }}"
        class="{{ $class }} w-full h-full object-cover" @if($lazy) loading="lazy" @endif />
</div>

<script>
    function imageLoader() {
    return {
        loading: true,
        loaded: false,
        error: false,

        init() {
            const img = this.$refs.image;

            img.onload = () => {
                this.loading = false;
                this.loaded = true;
                this.error = false;
            };

            img.onerror = () => {
                this.loading = false;
                this.loaded = false;
                this.error = true;
            };

            // If image is already cached, it might load immediately
            if (img.complete) {
                if (img.naturalWidth > 0) {
                    this.loading = false;
                    this.loaded = true;
                } else {
                    this.loading = false;
                    this.error = true;
                }
            }
        }
    }
}
</script>

<style>
    @media (prefers-reduced-motion: reduce) {
        .animate-pulse {
            animation: none;
        }
    }
</style>

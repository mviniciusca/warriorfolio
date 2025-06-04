@aware(['page'])

@if ($data['is_share_active'] ?? false)
<div {{ $attributes->class(['relative']) }} x-data="{ open: false }">
    <!-- Share Button -->
    <button @click="open = !open" @click.away="open = false"
        class="flex items-center gap-2 py-4 opacity-20 hover:opacity-100 transition-all duration-300 focus:outline-none focus:opacity-100"
        :class="{ 'opacity-100': open }">
        <x-ui.ionicon icon="share-outline" class="w-5 h-5" />
        <span class="font-mono text-xs uppercase">{{ __('Share') }}</span>
    </button>

    <!-- Dropdown Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="absolute bottom-full left-0 mb-2 saturn-bg border saturn-border rounded-lg shadow-lg min-w-[200px] z-50"
        x-cloak>
        <div class="p-3">
            <p class="text-xs uppercase tracking-wide mb-3 font-mono">{{ __('Share') }}
            </p>

            <div class="grid grid-cols-3 gap-3">
                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&quote={{ urlencode($page->title) }}"
                    target="_blank" class="flex flex-col items-center gap-1 p-2 rounded-md transition-colors group"
                    @click="open = false">
                    <x-ui.ionicon icon="logo-facebook" size="xl" />
                </a>

                <!-- Twitter -->
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($page->title) }}&url={{ urlencode(url()->current()) }}"
                    target="_blank" class="flex flex-col items-center gap-1 p-2 rounded-md transition-colors group"
                    @click="open = false">
                    <x-ui.ionicon icon="logo-twitter" size="xl" />
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/?text={{ urlencode($page->title . ' - ' . url()->current()) }}" target="_blank"
                    class="flex flex-col items-center gap-1 p-2 rounded-md transition-colors group"
                    @click="open = false">
                    <x-ui.ionicon icon="logo-whatsapp" size="xl" />
                </a>

                <!-- LinkedIn -->
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($page->title) }}"
                    target="_blank" class="flex flex-col items-center gap-1 p-2 rounded-md transition-colors group"
                    @click="open = false">
                    <x-ui.ionicon icon="logo-linkedin" size="xl" />
                </a>

                <!-- Pinterest -->
                <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&description={{ urlencode($page->title) }}"
                    target="_blank" class="flex flex-col items-center gap-1 p-2 rounded-md transition-colors group"
                    @click="open = false">
                    <x-ui.ionicon icon="logo-pinterest" size="xl" />
                </a>

                <!-- Reddit -->
                <a href="https://www.reddit.com/submit?url={{ urlencode(url()->current()) }}&title={{ urlencode($page->title) }}"
                    target="_blank" class="flex flex-col items-center gap-1 p-2 rounded-md transition-colors group"
                    @click="open = false">
                    <x-ui.ionicon icon="logo-reddit" size="xl" />
                </a>
            </div>
        </div>
    </div>
</div>
@endif

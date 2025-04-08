@props(['url' => null])

<div class="hero-section-featured-border mx-auto mt-8 p-2" id="browser-cover">
    <div class="flex items-center justify-between rounded-t-lg bg-black/10 p-2 dark:bg-black/50" id="browser-items">
        <!-- MacOS Style Buttons -->
        <div class="flex items-center gap-2">
            <span class="h-3 w-3 rounded-full bg-black/10 dark:bg-white/20"></span>
            <span class="h-3 w-3 rounded-full bg-black/10 dark:bg-white/20"></span>
            <span class="h-3 w-3 rounded-full bg-black/10 dark:bg-white/20"></span>
        </div>
        <!-- URL Bar -->
        <div class="mx-4 flex-grow">
            <input
                class="w-full rounded-md border border-black/20 bg-white px-2 py-1 text-xs text-black dark:border-white/10 dark:bg-black dark:text-white/60"
                readonly type="text" value="{{ $url ?? 'warriorfolio.vercel.app' }}" />
        </div>
        <!-- Placeholder for additional controls -->
        <div class="w-6"></div>
    </div>
    <div class="dark:border-white/10; mx-auto border border-black/10 bg-white/20 p-2 shadow-xl dark:bg-black/30"
        id="hero-featured-image">
        {{ $slot }}
    </div>
</div>

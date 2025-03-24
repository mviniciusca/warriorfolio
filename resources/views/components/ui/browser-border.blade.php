@props(['url' => null])


<div id="browser-cover" class="mt-8 p-2 mx-auto hero-section-featured-border">
    <div id="browser-items" class="flex items-center justify-between p-2 bg-black/10 dark:bg-black/50 rounded-t-lg">
        <!-- MacOS Style Buttons -->
        <div class="flex items-center gap-2">
            <span class="h-3 w-3 rounded-full bg-black/10 dark:bg-white/20"></span>
            <span class="h-3 w-3 rounded-full bg-black/10 dark:bg-white/20"></span>
            <span class="h-3 w-3 rounded-full bg-black/10 dark:bg-white/20"></span>
        </div>
        <!-- URL Bar -->
        <div class="flex-grow mx-4">
            <input type="text"
                class="w-full rounded-md border border-black/20 dark:border-white/10 bg-white dark:bg-black px-2 py-1 text-xs text-black dark:text-white/60"
                value="{{ $url ?? 'warriorfolio.vercel.app' }}" readonly />
        </div>
        <!-- Placeholder for additional controls -->
        <div class="w-6"></div>
    </div>
    <div class="mx-auto" id="hero-featured-image">
        {{ $slot }}
    </div>
</div>

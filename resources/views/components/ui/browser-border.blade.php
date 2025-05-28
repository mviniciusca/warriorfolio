@props(['url' => null, 'device' => 'browser'])

@if ($device === 'browser')
<div class="mx-auto mt-8 p-2" id="browser-cover">
    <div class="flex items-center border-x saturn-border-accent border-t border-b-transparent justify-between rounded-t-lg p-2 saturn-bg"
        id="browser-items">
        <!-- MacOS Style Buttons -->
        <div class="flex items-center gap-2">
            <span class="h-3 w-3 rounded-full saturn-bg-accent border saturn-border-accent"></span>
            <span class="h-3 w-3 rounded-full saturn-bg-accent border saturn-border-accent"></span>
            <span class="h-3 w-3 rounded-full saturn-bg-accent border saturn-border-accent"></span>
        </div>
        <!-- URL Bar -->
        <div class="mx-4 flex-grow">
            <input class="w-full rounded-full border saturn-border-accent px-2 py-1 text-xs text-saturn saturn-bg"
                readonly type="text" value="{{ $url ?? 'warriorfolio.vercel.app' }}" />
        </div>
        <!-- Placeholder for additional controls -->
        <div class="w-6"></div>
    </div>
    <div class="mx-auto border saturn-border-accent p-2 shadow-xl saturn-bg" id="hero-featured-image">
        {{ $slot }}
    </div>
</div>
@elseif ($device === 'mobile')
<div class="mx-auto mt-8" id="mobile-cover">
    <div class="mx-auto max-w-[320px] rounded-[2.5rem] border-[8px] border-black/10 bg-white/20 p-0 shadow-xl dark:border-white/10 dark:bg-black/30"
        id="mobile-mockup">
        <!-- Mobile Status Bar with Real-time Clock -->
        <div class="flex items-center justify-between rounded-t-3xl bg-black/10 px-4 py-2 dark:bg-black/50">
            <div x-data="{ time: '' }" x-init="
                time = new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                setInterval(() => {
                    time = new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                }, 1000)
            " x-text="time" class="text-xs font-medium text-black/70 dark:text-white/70"></div>
            <div class="rounded-full bg-black/20 px-2 py-0.5 dark:bg-white/20">
                <div class="h-2 w-16 rounded-full"></div>
            </div>
            <div class="flex items-center gap-1 text-xs text-black/70 dark:text-white/70">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 20.9994C16.4183 20.9994 20 17.4177 20 12.9994C20 8.58107 16.4183 4.99939 12 4.99939C7.58172 4.99939 4 8.58107 4 12.9994C4 17.4177 7.58172 20.9994 12 20.9994Z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M1 10L3 14H6V20H18V14H21L23 10H1Z"></path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M4 4H20V20H4V4Z"></path>
                </svg>
            </div>
        </div>

        <!-- Mobile Content -->
        <div class="h-[580px] overflow-hidden rounded-b-3xl">
            {{ $slot }}
        </div>

        <!-- Mobile Home Indicator -->
        <div class="flex justify-center rounded-b-3xl bg-black/10 py-1 dark:bg-black/50">
            <div class="h-1 w-1/3 rounded-full bg-black/20 dark:bg-white/20"></div>
        </div>
    </div>
</div>
@endif

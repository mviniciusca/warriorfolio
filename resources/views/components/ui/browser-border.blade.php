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
    <div class="mx-auto max-w-[320px] rounded-[2.5rem] border-8 saturn-border-accent saturn-bg p-0 shadow-xl"
        id="mobile-mockup">
        <!-- Mobile Status Bar with Real-time Clock -->
        <div class="flex items-center justify-between rounded-t-3xl saturn-bg-accent px-4 py-2">
            <div x-data="{ time: '' }" x-init="
                time = new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                setInterval(() => {
                    time = new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                }, 1000)
            " x-text="time" class="text-xs font-medium text-saturn"></div>
            <div class="rounded-full saturn-bg px-2 py-0.5">
                <div class="h-2 w-16 rounded-full saturn-border-accent border"></div>
            </div>
            <div class="flex items-center gap-1 text-xs text-saturn">
                <!-- Signal Strength -->
                <div class="flex items-end gap-0.5">
                    <div class="w-0.5 h-1 saturn-bg rounded-full"></div>
                    <div class="w-0.5 h-1.5 saturn-bg rounded-full"></div>
                    <div class="w-0.5 h-2 saturn-bg rounded-full"></div>
                    <div class="w-0.5 h-2.5 saturn-bg rounded-full"></div>
                </div>
                <!-- Wi-Fi -->
                <div class="relative w-3 h-3 flex items-center justify-center">
                    <div class="absolute w-2 h-2 rounded-full saturn-border-accent border opacity-30"></div>
                    <div class="absolute w-1.5 h-1.5 rounded-full saturn-border-accent border opacity-60"></div>
                    <div class="w-1 h-1 rounded-full saturn-bg"></div>
                </div>
                <!-- Battery -->
                <div class="flex items-center">
                    <div class="w-4 h-2 saturn-border-accent border rounded-sm relative">
                        <div class="w-3/4 h-full saturn-bg rounded-sm"></div>
                    </div>
                    <div class="w-0.5 h-1 saturn-border-accent border-l rounded-r-sm"></div>
                </div>
            </div>
        </div>

        <!-- Mobile Content -->
        <div class="h-[580px] overflow-hidden rounded-b-3xl">
            {{ $slot }}
        </div>

        <!-- Mobile Home Indicator -->
        <div class="flex justify-center rounded-b-3xl saturn-bg-accent py-1">
            <div class="h-1 w-1/3 rounded-full saturn-border-accent border"></div>
        </div>
    </div>
</div>
@endif

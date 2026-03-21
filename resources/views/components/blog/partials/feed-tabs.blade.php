@php
    use App\Support\NotesFeedUrl;

    $feed = request('feed', 'for-you');
    if (! in_array($feed, ['for-you', 'featured', 'category'], true)) {
        $feed = 'for-you';
    }
    $tabForYou = $feed === 'for-you';
    $tabFeatured = $feed === 'featured';
@endphp

<nav aria-label="{{ __('Notes feed') }}" class="mb-8"
    x-data="{
        left: 0,
        width: 0,
        init() {
            this.$nextTick(() => this.updateBar());
        },
        updateBar() {
            const list = this.$refs.tablist;
            const tab = list?.querySelector('[data-feed-active]');
            if (! list || ! tab) {
                this.width = 0;
                return;
            }
            this.left = tab.offsetLeft - list.scrollLeft;
            this.width = tab.offsetWidth;
        }
    }"
    x-init="init()"
    @resize.window="updateBar()">
    <div class="relative border-b border-neutral-200 dark:border-neutral-800">
        <div class="-mx-1 flex gap-6 overflow-x-auto px-1 pb-px sm:gap-8" x-ref="tablist"
            style="scrollbar-width: none"
            @scroll.passive="updateBar()">
            <a href="{{ NotesFeedUrl::build('for-you') }}"
                class="shrink-0 whitespace-nowrap pb-3 text-sm font-medium transition-colors hover:saturn-text"
                data-feed-tab
                @if ($tabForYou) data-feed-active @endif
                @class([
                    'saturn-text font-semibold' => $tabForYou,
                    'saturn-text-accent' => ! $tabForYou,
                ])>
                {{ __('For you') }}
            </a>
            <a href="{{ NotesFeedUrl::build('featured') }}"
                class="shrink-0 whitespace-nowrap pb-3 text-sm font-medium transition-colors hover:saturn-text"
                data-feed-tab
                @if ($tabFeatured) data-feed-active @endif
                @class([
                    'saturn-text font-semibold' => $tabFeatured,
                    'saturn-text-accent' => ! $tabFeatured,
                ])>
                {{ __('Featured') }}
            </a>
        </div>
        <div class="pointer-events-none absolute bottom-0 left-0 h-[2px] rounded-full bg-neutral-900 transition-[transform,width] duration-300 ease-out dark:bg-white"
            x-show="width > 0"
            x-cloak
            :style="`transform: translateX(${left}px); width: ${width}px`"></div>
    </div>
</nav>

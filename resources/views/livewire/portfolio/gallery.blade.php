@props(['is_section_filled_inverted'])

<div id="portfolio" x-data="{
    activeCategory: null,
    viewMode: $persist('normal'),
    transition: false,

    init() {
        // Prevent default hash change behavior
        window.addEventListener('hashchange', (e) => {
            if (e.target.location.hash === '#portfolio') {
                e.preventDefault();
                e.stopPropagation();
            }
        });

        this.$watch('activeCategory', () => {
            this.transition = true;
            setTimeout(() => this.transition = false, 300);
        });
    },

    resetView() {
        this.viewMode = 'normal';
        this.activeCategory = null;
        this.transition = true;
        setTimeout(() => this.transition = false, 300);
    },

    handleControlClick(e) {
        if (e.target.closest('[data-control]')) {
            e.preventDefault();
            e.stopPropagation();
        }
    }
}" x-cloak class="relative" @click="handleControlClick">
    <div class="mx-auto">
        {{-- Controls Component --}}
        <div data-control>
            <livewire:portfolio.gallery.controls />
        </div>

        {{-- Categories Component --}}
        <div data-control>
            <livewire:portfolio.gallery.categories />
        </div>

        {{-- Grid Component --}}
        <livewire:portfolio.gallery.grid />
    </div>
</div>

@props(['is_section_filled_inverted'])

<div id="portfolio" x-data="{
    activeCategory: null,
    viewMode: $persist('normal'),
    grayscale: $persist(true),
    transition: false,
    quickViewProject: null,
    showQuickView: false,

    init() {
        // Verificar se a categoria está na URL ao inicializar
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('activeCategory')) {
            this.activeCategory = parseInt(urlParams.get('activeCategory')) || null;
        }

        // Ouvir mudanças de categoria dos componentes Livewire
        this.$wire.on('category-changed', ({ categoryId }) => {
            this.activeCategory = categoryId;
        });

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

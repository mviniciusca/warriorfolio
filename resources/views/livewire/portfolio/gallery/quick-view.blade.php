{{-- Quick View Modal --}}
<div x-data="{
    show: false,
    project: null,
    baseUrl: '{{ config('app.url') }}',
    toggleBodyScroll() {
        if (this.show) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }
}" @open-quick-view.window="
    project = $event.detail;
    show = true;
    toggleBodyScroll();
    $nextTick(() => $refs.dialog.focus());
" @keydown.escape.window="show = false; toggleBodyScroll()"
    @keydown.tab.prevent="$event.shiftKey ? $refs.closeBtn.focus() : $refs.closeBtn.focus()">

    {{-- Backdrop with Blur --}}
    <div x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm dark:bg-black/60"
        @click="show = false; toggleBodyScroll()">
    </div>

    {{-- Modal Dialog --}}
    <div x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
        @click.self="show = false; toggleBodyScroll()">

        {{-- Close Button (Moved Outside the Card) --}}
        <button x-ref="closeBtn" @click="show = false; toggleBodyScroll()"
            class="absolute right-6 top-6 z-50 flex h-8 w-8 items-center justify-center rounded-full bg-white/90 transition-colors hover:bg-white shadow-lg dark:bg-secondary-900/90 dark:hover:bg-secondary-900">
            <span class="sr-only">{{ __('Close modal') }}</span>
            <x-ui.ionicon icon="close-outline" class="h-4 w-4 text-secondary-700 dark:text-secondary-300" />
        </button>

        <div x-ref="dialog" role="dialog" aria-modal="true" :aria-labelledby="'modal-title-' + project?.id"
            class="relative w-full max-w-2xl overflow-hidden rounded-xl focus:outline-none border border-secondary-200 dark:border-secondary-800 shadow-xl">

            {{-- Project Content --}}
            <div class="group relative bg-white dark:bg-secondary-900">
                {{-- Project Image --}}
                <div class="aspect-[3/2] w-full overflow-hidden">
                    <img x-bind:src="'/storage/' + (project ? project.image_cover : '')"
                        x-bind:alt="project ? project.title : ''"
                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-105">
                </div>

                {{-- Category Badge --}}
                <div
                    class="absolute top-6 left-6 z-10 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <div class="flex items-center gap-1 w-fit rounded-lg border px-2 py-0.5 text-xs font-medium text-white bg-opacity-75 border-transparent"
                        x-bind:style="(project && project.category) ?
                        `background-color: ${project.category.hex_color}; border-color: ${project.category.hex_color};`
                        : 'background-color: rgb(17, 24, 39); border-color: rgb(17, 24, 39);'">
                        <span x-show="project && project.category && project.category.icon">
                            <x-ui.ionicon :icon="'bookmark-sharp'" class="h-3 w-3" />
                        </span>
                        <span x-text="(project && project.category) ? project.category.name : ''"></span>
                    </div>
                </div>

                {{-- Bottom Shadow with Info --}}
                <div
                    class="absolute inset-x-0 bottom-0 h-3/5 bg-gradient-to-t from-black via-black/80 to-transparent pb-[1px] opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <div class="p-6 absolute bottom-0 left-0 right-0">
                        {{-- Title --}}
                        <h3 x-bind:id="'modal-title-' + (project ? project.id : '')"
                            class="text-base font-medium text-white opacity-0 translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0"
                            x-text="project ? project.title : ''">
                        </h3>

                        {{-- Link --}}
                        <div class="mt-1.5">
                            <a x-bind:href="baseUrl + '/' + (project ? project.slug : '')"
                                class="group/link inline-flex items-center text-white/80 transition-colors hover:text-white">
                                <span
                                    class="text-xs opacity-0 translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0 flex items-center">
                                    {{ __('View Full Project') }}
                                    <x-ui.ionicon icon="arrow-forward-outline"
                                        class="h-4 w-4 ml-1.5 -mr-1 transition-transform duration-300 group-hover/link:translate-x-1" />
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

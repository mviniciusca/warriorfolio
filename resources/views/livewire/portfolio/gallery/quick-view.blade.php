{{-- Quick View Modal --}}
<div x-data="{
    show: false,
    project: null,
    baseUrl: '{{ config('app.url') }}'
}" @open-quick-view.window="
    project = $event.detail;
    show = true;
    $nextTick(() => $refs.dialog.focus());
" @keydown.escape.window="show = false"
    @keydown.tab.prevent="$event.shiftKey ? $refs.closeBtn.focus() : $refs.closeBtn.focus()">

    {{-- Backdrop with Blur --}}
    <div x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm dark:bg-black/60" @click="show = false">
    </div>

    {{-- Modal Dialog --}}
    <div x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6" @click.self="show = false">

        <div x-ref="dialog" role="dialog" aria-modal="true" :aria-labelledby="'modal-title-' + project?.id"
            class="relative w-full max-w-2xl overflow-hidden rounded-xl focus:outline-none">

            {{-- Close Button --}}
            <button x-ref="closeBtn" @click="show = false"
                class="absolute right-4 top-4 z-50 flex h-7 w-7 items-center justify-center rounded-full bg-white/90 transition-colors hover:bg-white dark:bg-secondary-900/90 dark:hover:bg-secondary-900">
                <span class="sr-only">Close modal</span>
                <x-ui.ionicon icon="close-outline" class="h-4 w-4 text-secondary-700 dark:text-secondary-300" />
            </button>

            {{-- Project Content --}}
            <div class="group relative">
                {{-- Project Image --}}
                <div class="aspect-[3/2] w-full overflow-hidden">
                    <img :src="'/storage/' + project?.image_cover" :alt="project?.title"
                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-105">
                </div>

                {{-- Top Shadow with Category --}}
                <div
                    class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/80 via-black/40 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <div class="p-6">
                        <div class="flex items-center gap-1 w-fit rounded-lg border px-2 py-0.5 text-xs font-medium text-white bg-opacity-75 border-transparent"
                            :style="project?.category?.hex_color ? {
                                backgroundColor: project.category.hex_color,
                                borderColor: project.category.hex_color
                            } : { backgroundColor: 'rgb(17, 24, 39)' }">
                            <span x-show="project?.category?.icon">
                                <x-ui.ionicon :icon="'bookmark-sharp'" class="h-3 w-3" />
                            </span>
                            <span x-text="project?.category?.name"></span>
                        </div>
                    </div>
                </div>

                {{-- Bottom Shadow with Info --}}
                <div
                    class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <div class="p-6">
                        {{-- Title --}}
                        <h3 :id="'modal-title-' + project?.id"
                            class="text-base font-medium text-white opacity-0 translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0"
                            x-text="project?.title">
                        </h3>

                        {{-- Link --}}
                        <div class="mt-3">
                            <a :href="baseUrl + '/' + project?.slug"
                                class="group/link inline-flex items-center text-white/80 transition-colors hover:text-white">
                                <span
                                    class="text-sm font-medium opacity-0 translate-y-2 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0 flex items-center">
                                    View Full Project
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

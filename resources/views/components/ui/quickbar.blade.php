<div x-data="{
        isExpanded: false,
        toggleExpand() { this.isExpanded = !this.isExpanded; },
        closeExpand() { this.isExpanded = false; }
    }" class="fixed z-50" x-cloak>
    <!-- Botão fixo lateral -->
    <button @click="toggleExpand"
        class="fixed left-0 top-1/2 -translate-y-1/2 bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-700 text-zinc-600 dark:text-zinc-400 hover:text-zinc-800 dark:hover:text-zinc-200 p-2 rounded-r-md shadow-md transition-all duration-200 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-zinc-300 dark:focus:ring-zinc-600"
        title="Open Menu">
        <x-ui.ionicon :icon="'chevron-forward-outline'" class="w-5 h-5" />
    </button>

    <!-- Modal Backdrop -->
    <div x-show="isExpanded" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 bg-zinc-900/90 dark:bg-black/90 backdrop-blur-sm" @click="closeExpand"
        style="display: none;"></div>

    <!-- Modal Content Centralizado -->
    <div x-show="isExpanded" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-50 flex items-center justify-center p-4"
        @click.away="closeExpand" style="display: none;">
        <div
            class="bg-white dark:bg-zinc-900 rounded-lg shadow-xl w-full max-w-3xl max-h-[85vh] overflow-y-auto border border-zinc-200 dark:border-zinc-800">
            <div
                class="sticky top-0 bg-white dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-800 p-4 flex justify-between items-center">
                <h2 class="text-base font-medium text-zinc-800 dark:text-zinc-200">Quick Access Menu</h2>
                <button @click="closeExpand"
                    class="p-1 rounded-md text-zinc-600 dark:text-zinc-400 hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:text-zinc-800 dark:hover:text-zinc-200 transition-colors">
                    <x-ui.ionicon :icon="'close-outline'" class="w-5 h-5" />
                </button>
            </div>

            <div class="p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- General -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-2">
                            General</h3>
                        <a href="{{-- route('dashboard') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'grid-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Dashboard</span>
                        </a>
                        <a href="{{-- route('home') --}}" target="_blank"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'eye-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">View Website</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.media.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'images-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Media ({{ $mediaCount ?? 0 }})</span>
                        </a>
                    </div>

                    <!-- Core Features -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-2">
                            Core Features</h3>
                        <a href="{{-- route('filament.admin.resources.inbox.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'mail-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Inbox ({{ $inboxCount ?? 1 }})</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.notes.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'document-text-outline'"
                                class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Notes ({{ $noteCount ?? 1 }})</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.projects.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'briefcase-outline'"
                                class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Projects ({{ $projectCount ?? 7
                                }})</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.categories.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'pricetags-outline'"
                                class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Categories ({{ $categoryCount ?? 6
                                }})</span>
                        </a>
                        <a href="{{-- route('filament.admin.pages.profile') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'person-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Profile</span>
                        </a>
                    </div>

                    <!-- Customers -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-2">
                            Customers</h3>
                        <a href="{{-- route('filament.admin.resources.subscribers.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'people-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Subscribers ({{ $subscriberCount ?? 1
                                }})</span>
                        </a>
                    </div>

                    <!-- Website Design -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-2">
                            Website Design</h3>
                        <a href="{{-- route('filament.admin.resources.pages.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'document-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Pages ({{ $pageCount ?? 3 }})</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.hero.edit', ['record' => 1]) --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'flag-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Hero Section</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.settings.background') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'color-palette-outline'"
                                class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Background & Logo</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.navigation.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'menu-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Navigation</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.sliders.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'albums-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Sliders</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.alerts.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'alert-circle-outline'"
                                class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Website Alerts ({{ $alertCount ?? 1
                                }})</span>
                        </a>
                    </div>

                    <!-- App Sections -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-2">
                            App Sections</h3>
                        <a href="{{-- route('filament.admin.resources.sections.about') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'information-circle-outline'"
                                class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">About Section</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.sections.projects') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'construct-outline'"
                                class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Projects Section</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.sections.contact') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'call-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Contact Section</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.sections.more') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'add-circle-outline'"
                                class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">More Sections</span>
                        </a>
                    </div>

                    <!-- Settings -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-2">
                            Settings</h3>
                        <a href="{{-- route('filament.admin.resources.activity-log.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'time-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Activity Log</span>
                        </a>
                        <a href="{{-- route('filament.admin.resources.settings.application') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'settings-outline'" class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Application Settings</span>
                        </a>
                        <a href="{{-- route('log-viewer.index') --}}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <x-ui.ionicon :icon="'clipboard-outline'"
                                class="w-4 h-4 text-zinc-600 dark:text-zinc-400" />
                            <span class="text-xs text-zinc-800 dark:text-zinc-200">Log Viewer</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

@auth
<div x-data="{
        isExpanded: false,
        toggleExpand() { this.isExpanded = !this.isExpanded; },
        closeExpand() { this.isExpanded = false; }
    }" class="fixed z-50" x-cloak>
    <!-- Botão fixo lateral -->
    <button @click="toggleExpand"
        class="fixed left-0 top-1/2 -translate-y-1/2 bg-secondary-100 dark:bg-secondary-800 hover:bg-secondary-200 dark:hover:bg-secondary-700 p-2 rounded-r-md shadow-md transition-all duration-200 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-secondary-300 dark:focus:ring-secondary-600"
        title="Open Menu">
        <x-ui.ionicon :icon="'chevron-forward-outline'" class="w-5 h-5" />
    </button>

    <!-- Modal Backdrop -->
    <div x-show="isExpanded" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 bg-secondary-900/90 dark:bg-black/90 backdrop-blur-sm" @click="closeExpand"
        style="display: none;"></div>

    <!-- Modal Content Centralizado -->
    <div x-show="isExpanded" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-50 flex items-center justify-center p-4"
        @click.away="closeExpand" style="display: none;">
        <div
            class="bg-white dark:bg-secondary-900 rounded-lg shadow-xl w-full max-w-3xl max-h-[85vh] overflow-y-auto border border-secondary-200 dark:border-secondary-800">
            <div
                class="sticky top-0 bg-white dark:bg-secondary-900 border-b border-secondary-200 dark:border-secondary-800 p-4 flex justify-between items-center">
                <!-- Left section with icon and text -->
                <div class="flex items-center gap-3 flex-1">
                    <div class="flex-shrink-0">
                        <x-ui.ionicon :icon="'flash-outline'" class="w-6 h-6" />
                    </div>
                    <div class="flex flex-col">
                        <span class="font-medium">{{ settings('application.name') ?? config('app.name', 'Warriorfolio')
                            }}</span>
                        <span class="text-xs opacity-75">{{ auth()->user()->name ?? config('app.name', 'Warriorfolio')
                            }}</span>
                    </div>
                </div>
                <!-- Right - Close button -->
                <button @click="closeExpand"
                    class="p-1 rounded-full flex items-center justify-center hover:bg-secondary-200 dark:hover:bg-secondary-800 transition-colors">
                    <x-ui.ionicon :icon="'close-outline'" class="w-5 h-5" />
                </button>
            </div>

            <div class="p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- General -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium uppercase tracking-wider mb-2">
                            General</h3>
                        <a href="{{ route('filament.admin.pages.dashboard') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'grid-outline'" class="w-4 h-4" />
                            <span class="text-xs">Dashboard</span>
                        </a>
                        <a href="{{ url('/') }}" target="_blank"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'eye-outline'" class="w-4 h-4" />
                            <span class="text-xs">View Website</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.media.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'images-outline'" class="w-4 h-4" />
                            <span class="text-xs">Media ({{ $mediaCount ?? 0
                                }})</span>
                        </a>
                    </div>

                    <!-- Core Features -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium uppercase tracking-wider mb-2">
                            Core Features</h3>
                        <a href="{{ route('filament.admin.resources.mails.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'mail-outline'" class="w-4 h-4" />
                            <span class="text-xs">Mails ({{ $inboxCount ?? 1
                                }})</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.posts.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'document-text-outline'" class="w-4 h-4" />
                            <span class="text-xs">Posts ({{ $noteCount ?? 1
                                }})</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.projects.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'briefcase-outline'" class="w-4 h-4" />
                            <span class="text-xs">Projects ({{ $projectCount
                                ?? 7
                                }})</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.categories.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'pricetags-outline'" class="w-4 h-4" />
                            <span class="text-xs">Categories ({{
                                $categoryCount ?? 6
                                }})</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.profiles.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'person-outline'" class="w-4 h-4" />
                            <span class="text-xs">Profile</span>
                        </a>
                    </div>

                    <!-- Customers -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium uppercase tracking-wider mb-2">
                            Customers</h3>
                        <a href="{{ route('filament.admin.resources.newsletters.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'people-outline'" class="w-4 h-4" />
                            <span class="text-xs">Newsletters</span>
                        </a>
                    </div>

                    <!-- Website Design -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium uppercase tracking-wider mb-2">
                            Website Design</h3>
                        <a href="{{ route('filament.admin.resources.pages.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'document-outline'" class="w-4 h-4" />
                            <span class="text-xs">Pages ({{ $pageCount ?? 3
                                }})</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.edit-hero-section', ['record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'flag-outline'" class="w-4 h-4" />
                            <span class="text-xs">Hero Section</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.edit-appearance', ['record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'color-palette-outline'" class="w-4 h-4" />
                            <span class="text-xs">Appearance</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.edit-navigation', ['record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'menu-outline'" class="w-4 h-4" />
                            <span class="text-xs">Navigation</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.slideshows.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'albums-outline'" class="w-4 h-4" />
                            <span class="text-xs">Slideshows</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.alerts.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'alert-circle-outline'" class="w-4 h-4" />
                            <span class="text-xs">Alerts ({{
                                $alertCount ?? 1
                                }})</span>
                        </a>
                    </div>

                    <!-- App Sections -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium uppercase tracking-wider mb-2">
                            App Sections</h3>
                        <a href="{{ route('filament.admin.resources.settings.edit-about-section', ['record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'information-circle-outline'" class="w-4 h-4" />
                            <span class="text-xs">About Section</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.edit-portfolio-section', ['record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'construct-outline'" class="w-4 h-4" />
                            <span class="text-xs">Portfolio Section</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.edit-contact-section', ['record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'call-outline'" class="w-4 h-4" />
                            <span class="text-xs">Contact Section</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.edit-client-section', ['record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'add-circle-outline'" class="w-4 h-4" />
                            <span class="text-xs">Client Section</span>
                        </a>
                    </div>

                    <!-- Settings -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium uppercase tracking-wider mb-2">
                            Settings</h3>
                        <a href="{{ route('filament.admin.resources.activity-logs.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'time-outline'" class="w-4 h-4" />
                            <span class="text-xs">Activity Log</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'settings-outline'" class="w-4 h-4" />
                            <span class="text-xs">Settings</span>
                        </a>
                        <a href="{{ route('log-viewer.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'clipboard-outline'" class="w-4 h-4" />
                            <span class="text-xs">Log Viewer</span>
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
@endauth

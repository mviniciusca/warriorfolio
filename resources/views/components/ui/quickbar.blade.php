@if($isActive)
@auth
<div x-data="{
        isExpanded: false,
        toggleExpand() { this.isExpanded = !this.isExpanded; },
        closeExpand() { this.isExpanded = false; }
    }" class="fixed z-50" x-cloak>
    <!-- Side Btn -->
    <button @click="toggleExpand"
        class="fixed left-0 top-1/2 -translate-y-1/2 bg-secondary-100 dark:bg-secondary-800 hover:bg-secondary-200 dark:hover:bg-secondary-700 p-2 rounded-r-md shadow-md transition-all duration-200 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-secondary-300 dark:focus:ring-secondary-600"
        title="{{ __('Open Menu') }}">
        <x-ui.ionicon :icon="'chevron-forward-outline'" class="w-5 h-5" />
    </button>

    <!-- Modal Backdrop -->
    <div x-show="isExpanded" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 bg-secondary-50/50 dark:bg-black/50 backdrop-blur-sm" @click="closeExpand"
        style="display: none;"></div>

    <!-- Modal Content -->
    <div x-show="isExpanded" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-4"
        class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.away="closeExpand"
        style="display: none;">
        <div
            class="bg-white/90 dark:bg-secondary-950/90 rounded-lg shadow-xl w-full max-w-3xl max-h-[85vh] overflow-y-auto border border-secondary-200 dark:border-secondary-800">
            <div
                class="sticky top-0 bg-white dark:bg-secondary-900 border-b border-secondary-200 dark:border-secondary-800 p-4 flex justify-between items-center">
                <!-- Left section with icon and text -->
                <div class="flex items-center gap-3 flex-1">
                    <div class="flex-shrink-0">
                        <x-ui.ionicon :icon="'flash-outline'" class="w-6 h-6" />
                    </div>
                    <div class="flex flex-col">
                        <span class="font-medium text-sm">{{ __('Quick Access') }}</span>
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
                            {{ __('General') }}</h3>
                        <a href="{{ route('filament.admin.pages.dashboard') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'game-controller-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Dashboard') }}</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.media.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'images-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Media') }}</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.pages.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'brush-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Theme Switch') }}</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.edit-maintenance-section',['record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'construct-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Maintenance Mode') }}</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.edit-security', [
                        'record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'lock-open-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Account Security Manager') }}</span>
                        </a>
                    </div>

                    <!-- Core Features -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium uppercase tracking-wider mb-2">
                            {{ __('Core Features') }}</h3>
                        <a href="{{ route('filament.admin.resources.mails.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'mail-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Mails') }}</span>
                            @if($mailCount > 0)
                            <span
                                class="px-2 text-xs font-medium rounded-full border-t border-secondary-200 dark:border-secondary-700 bg-secondary-100 dark:bg-secondary-800">
                                {{ $mailCount }}
                            </span>
                            @endif
                        </a>
                        <a href="{{ route('filament.admin.resources.posts.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'document-text-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Posts') }}</span>
                            @if($postCount > 0)
                            <span
                                class="px-2 text-xs font-medium rounded-full border-t border-secondary-200 dark:border-secondary-700 bg-secondary-100 dark:bg-secondary-800">
                                {{ $postCount }}
                            </span>
                            @endif
                        </a>
                        <a href="{{ route('filament.admin.resources.projects.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'briefcase-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Projects') }}</span>
                            @if($projectCount > 0)
                            <span
                                class="px-2 text-xs font-medium rounded-full border-t border-secondary-200 dark:border-secondary-700 bg-secondary-100 dark:bg-secondary-800">
                                {{ $projectCount }}
                            </span>
                            @endif
                        </a>
                        <a href="{{ route('filament.admin.resources.categories.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'pricetags-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Categories') }}</span>
                            @if($categoryCount > 0)
                            <span
                                class="px-2 text-xs font-medium rounded-full border-t border-secondary-200 dark:border-secondary-700 bg-secondary-100 dark:bg-secondary-800">
                                {{ $categoryCount }}
                            </span>
                            @endif
                        </a>
                        <a href="{{ route('filament.admin.resources.profiles.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'person-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Profile') }}</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.customers.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'people-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Customers') }}</span>
                        </a>
                    </div>

                    <!-- Website Design -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium uppercase tracking-wider mb-2">
                            {{ __('Website Design') }}</h3>
                        <a href="{{ route('filament.admin.resources.pages.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'document-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Pages') }}</span>
                            @if($pageCount > 0)
                            <span
                                class="px-2 text-xs font-medium rounded-full border-t border-secondary-200 dark:border-secondary-700 bg-secondary-100 dark:bg-secondary-800">
                                {{ $pageCount }}
                            </span>
                            @endif
                        </a>
                        <a href="{{ route('filament.admin.resources.heroes.index' }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'flag-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Hero Section') }}</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.edit-appearance', ['record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'color-palette-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Appearance') }}</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.edit-navigation', ['record' => 1]) }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'menu-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Navigation') }}</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.slideshows.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'albums-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Slideshows') }}</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.alerts.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'alert-circle-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Alerts') }}</span>
                        </a>
                    </div>

                    <!-- App Sections -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium uppercase tracking-wider mb-2">
                            {{ __('App Sections') }}</h3>
                        <a href="{{ route('filament.admin.resources.sections.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'radio-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('App Sections') }}</span>
                        </a>
                    </div>

                    <!-- Settings -->
                    <div class="space-y-1">
                        <h3 class="text-xs font-medium uppercase tracking-wider mb-2">
                            {{ __('Settings') }}</h3>
                        <a href="{{ route('filament.admin.resources.activity-logs.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'time-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Activity Log') }}</span>
                        </a>
                        <a href="{{ route('filament.admin.resources.settings.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'settings-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Settings') }}</span>
                        </a>
                        <a href="{{ route('log-viewer.index') }}"
                            class="flex items-center gap-2 p-1.5 rounded-md hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
                            <x-ui.ionicon :icon="'clipboard-outline'" class="w-4 h-4" />
                            <span class="text-xs">{{ __('Log Viewer') }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div
                class="sticky bottom-0 bg-white dark:bg-secondary-900 border-t border-secondary-200 dark:border-secondary-800 p-4 flex justify-between items-center">
                <!-- Left section with user info -->
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <x-ui.ionicon :icon="'person-circle-outline'" class="w-6 h-6" />
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs opacity-75">{{ __('Logged in as') }}</span>
                        <span class="font-medium text-sm">{{ auth()->user()->name }}</span>
                    </div>
                </div>
                <!-- Right section with dark mode toggle and logout -->
                <div class="flex items-center gap-2">
                    <livewire:dark-mode wire:key='footer-dark-mode' />
                    <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-2 px-3 py-1.5 text-xs border border-secondary-200 dark:border-secondary-700 rounded-md bg-secondary-50 dark:bg-secondary-800 hover:bg-secondary-200/80 dark:hover:bg-secondary-700/60 transition-colors">
                            <x-ui.ionicon :icon="'log-out-outline'" class="w-4 h-4" />
                            <span>{{ __('Logout from Dashboard') }}</span>
                        </button>
                    </form>
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
@endif

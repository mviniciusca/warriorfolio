@if($isActive)
@auth
<div x-data="{
        isExpanded: false,
        toggleExpand() { this.isExpanded = !this.isExpanded; },
        closeExpand() { this.isExpanded = false; }
    }" class="fixed z-40" x-cloak>
    <!-- Side Btn -->
    <button @click="toggleExpand" class="fixed -left-1 top-1/2 -translate-y-1/2 saturn-btn saturn-btn-primary-inverse"
        title="{{ __('Open Quickbar') }}">
        <x-ui.ionicon :icon="'chevron-forward-outline'" />
    </button>

    <!-- Modal Backdrop -->
    <div x-show="isExpanded" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 saturn-modal-bg" @click="closeExpand" style="display: none;"></div>

    <!-- Modal Content -->
    <div x-show="isExpanded" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-4"
        class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.away="closeExpand"
        style="display: none;">
        <div class="saturn-bg rounded-lg shadow-xl w-full max-w-3xl max-h-[85vh] overflow-y-auto border saturn-border">
            <div class="sticky top-0  border-b saturn-border p-4 flex justify-between items-center">
                <!-- Left section with icon and text -->
                <div class="flex items-center gap-3 flex-1">
                    {{-- <div class="flex-shrink-0">
                        <x-ui.ionicon :icon="'flash-outline'" class="w-6 h-6" />
                    </div> --}}
                    <div class="flex flex-col">
                        <span class="font-medium text-xs">{{ __('Warriorfolio Quickbar') }}</span>
                    </div>
                </div>
                <!-- Right section with dark mode switch and close button -->
                <div class="flex items-center gap-3">
                    <livewire:dark-mode wire:key='header-dark-mode' />
                    <div class="w-px h-5 saturn-border bg-current opacity-20"></div>
                    <button @click="closeExpand"
                        class="p-1 rounded-full flex items-center justify-center hover:saturn-bg-accent transition-colors">
                        <x-ui.ionicon :icon="'close-outline'" class="w-5 h-5" />
                    </button>
                </div>
            </div>

            <div class="p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- General -->
                    <div class="space-y-1">
                        <h3 class="text-[10px] uppercase tracking-widest mb-3">
                            {{ __('General') }}</h3>
                        <x-ui.link href="{{ route('filament.admin.pages.dashboard') }}" icon="home-outline"
                            text="Dashboard Max" />
                        <x-ui.link href="{{ route('filament.admin.resources.media.index') }}" icon="images-outline"
                            text="{{ __('Media') }}" />
                        <x-ui.link href="{{ route('filament.admin.resources.pages.index') }}" icon="brush-outline"
                            text="{{ __('Theme Switch') }}" />
                        <x-ui.link
                            href="{{ route('filament.admin.resources.settings.edit-maintenance-section',['record' => 1]) }}"
                            icon="construct-outline" text="{{ __('Maintenance Mode') }}" />
                        <x-ui.link
                            href="{{ route('filament.admin.resources.settings.edit-security', ['record' => 1]) }}"
                            icon="lock-open-outline" text="{{ __('Account Security Manager') }}" />
                    </div>

                    <!-- Core Features -->
                    <div class="space-y-1">
                        <h3 class="text-[10px] uppercase tracking-widest mb-3">
                            {{ __('Core Features') }}</h3>
                        <x-ui.link href="{{ route('filament.admin.resources.mails.index') }}" icon="mail-outline"
                            text="{{ __('Mails') }}" badge="{{ $mailCount > 0 ? $mailCount : '' }}" />
                        <x-ui.link href="{{ route('filament.admin.resources.posts.index') }}"
                            icon="document-text-outline" text="{{ __('Posts') }}"
                            badge="{{ $postCount > 0 ? $postCount : '' }}" />
                        <x-ui.link href="{{ route('filament.admin.resources.projects.index') }}"
                            icon="briefcase-outline" text="{{ __('Projects') }}"
                            badge="{{ $projectCount > 0 ? $projectCount : '' }}" />
                        <x-ui.link href="{{ route('filament.admin.resources.categories.index') }}"
                            icon="pricetags-outline" text="{{ __('Categories') }}"
                            badge="{{ $categoryCount > 0 ? $categoryCount : '' }}" />
                        <x-ui.link href="{{ route('filament.admin.resources.profiles.index') }}" icon="person-outline"
                            text="{{ __('Profile') }}" />
                        <x-ui.link href="{{ route('filament.admin.resources.customers.index') }}" icon="people-outline"
                            text="{{ __('Customers') }}" />
                    </div>

                    <!-- Website Design -->
                    <div class="space-y-1">
                        <h3 class="text-[10px] uppercase  tracking-widest mb-3">
                            {{ __('Website Design') }}</h3>
                        <x-ui.link href="{{ route('filament.admin.resources.pages.index') }}" icon="document-outline"
                            text="{{ __('Pages') }}" badge="{{ $pageCount > 0 ? $pageCount : '' }}" />
                        <x-ui.link href="{{ route('filament.admin.resources.heroes.index') }}" icon="flag-outline"
                            text="{{ __('Hero Section') }}" />
                        <x-ui.link
                            href="{{ route('filament.admin.resources.settings.edit-appearance', ['record' => 1]) }}"
                            icon="color-palette-outline" text="{{ __('Appearance') }}" />
                        <x-ui.link
                            href="{{ route('filament.admin.resources.settings.edit-navigation', ['record' => 1]) }}"
                            icon="menu-outline" text="{{ __('Navigation') }}" />
                        <x-ui.link href="{{ route('filament.admin.resources.slideshows.index') }}" icon="albums-outline"
                            text="{{ __('Slideshows') }}" />
                        <x-ui.link href="{{ route('filament.admin.resources.alerts.index') }}"
                            icon="alert-circle-outline" text="{{ __('Alerts') }}" />
                    </div>

                    <!-- App Sections -->
                    <div class="space-y-1">
                        <h3 class="text-[10px] uppercase  tracking-widest mb-3">
                            {{ __('App Sections') }}</h3>
                        <x-ui.link href="{{ route('filament.admin.resources.sections.index') }}" icon="radio-outline"
                            text="{{ __('App Sections') }}" />
                    </div>

                    <!-- Settings -->
                    <div class="space-y-1">
                        <h3 class="text-[10px] uppercase  tracking-widest mb-3">
                            {{ __('Settings') }}</h3>
                        <x-ui.link href="{{ route('filament.admin.resources.activity-logs.index') }}"
                            icon="time-outline" text="{{ __('Activity Log') }}" />
                        <x-ui.link href="{{ route('filament.admin.resources.settings.index') }}" icon="settings-outline"
                            text="{{ __('Settings') }}" />
                        <x-ui.link href="{{ route('log-viewer.index') }}" icon="clipboard-outline"
                            text="{{ __('Log Viewer') }}" />
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="sticky bottom-0 border-t saturn-border p-4 flex justify-between items-center">
                <!-- Left section with user info -->
                <div class="flex items-center gap-2">
                    <x-ui.ionicon :icon="'person-circle-outline'" class="w-6 h-6" />
                    <span class="font-medium text-xs">{{ auth()->user()->name ?? config('app.name', 'Warriorfolio')
                        }}</span>
                </div>
                <!-- Right section with logout -->
                <div class="flex items-center">
                    @auth
                    <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
                        @csrf
                        <x-ui.button style="secondary" :icon_before="false" class="text-xs" icon="log-out-outline"
                            type="submit">
                            {{ __('Logout') }}
                        </x-ui.button>
                    </form>
                    @endauth
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

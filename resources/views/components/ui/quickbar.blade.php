@php
    use App\Filament\Resources\AlertResource;
    use App\Filament\Resources\CategoryResource;
    use App\Filament\Resources\CustomerResource;
    use App\Filament\Resources\HeroResource;
    use App\Filament\Resources\MailResource;
    use App\Filament\Resources\PageResource;
    use App\Filament\Resources\PostResource;
    use App\Filament\Resources\ProfileResource;
    use App\Filament\Resources\ProjectResource;
    use App\Filament\Resources\SectionResource;
    use App\Filament\Resources\SettingResource;
    use App\Filament\Resources\SlideshowResource;
    use App\Models\Setting;
    use Awcodes\Curator\Resources\MediaResource;
    use Z3d0X\FilamentLogger\Resources\ActivityResource;

    $settingId = Setting::query()->value('id') ?? 1;
@endphp
@if($isActive)
@auth
<div x-data="{
        isExpanded: false,
        toggleExpand() { this.isExpanded = !this.isExpanded },
        closeExpand() { this.isExpanded = false }
    }"
    @keydown.escape.window="closeExpand"
    class="fixed z-40"
    x-cloak>
    <button type="button"
        id="warriorfolio-quickbar-trigger"
        @click="toggleExpand"
        :aria-expanded="isExpanded"
        aria-controls="warriorfolio-quickbar-panel"
        data-title-open="{{ __('Open Quickbar') }}"
        data-title-close="{{ __('Close Quickbar') }}"
        x-bind:title="isExpanded ? $el.dataset.titleClose : $el.dataset.titleOpen"
        class="fixed left-0 top-1/2 z-40 flex h-[3.25rem] w-11 -translate-y-1/2 items-center justify-center rounded-r-2xl border border-l-0 saturn-border saturn-bg shadow-md ring-1 ring-black/5 transition hover:saturn-bg-accent hover:shadow-lg focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saturn-950/25 focus-visible:ring-offset-2 dark:ring-white/10 dark:focus-visible:ring-saturn-100/20 dark:focus-visible:ring-offset-saturn-950">
        <span x-show="!isExpanded" class="flex items-center justify-center" aria-hidden="true">
            <x-ui.ionicon icon="grid-outline" class="h-5 w-5" />
        </span>
        <span x-show="isExpanded" class="flex items-center justify-center" style="display: none;" aria-hidden="true">
            <x-ui.ionicon icon="chevron-back-outline" class="h-5 w-5" />
        </span>
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
        <div id="warriorfolio-quickbar-panel"
            role="dialog"
            aria-modal="true"
            aria-labelledby="warriorfolio-quickbar-title"
            class="saturn-bg w-full max-h-[85vh] max-w-3xl overflow-y-auto rounded-xl border saturn-border shadow-xl ring-1 ring-black/5 dark:ring-white/10">
            <div class="sticky top-0 flex items-center justify-between gap-3 border-b saturn-border p-4 saturn-bg">
                <div class="flex min-w-0 flex-1 items-center gap-3">
                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border saturn-border bg-black/[0.04] saturn-text dark:bg-white/[0.06]">
                        <x-ui.ionicon icon="flash-outline" class="h-5 w-5 opacity-90" />
                    </div>
                    <div class="min-w-0 flex flex-col gap-0.5">
                        <span id="warriorfolio-quickbar-title" class="text-sm font-semibold tracking-tight saturn-text">
                            {{ __('Warriorfolio Quickbar') }}
                        </span>
                        <span class="text-[11px] leading-tight saturn-text-accent">
                            {{ __('Shortcuts to your admin tools') }}
                        </span>
                    </div>
                </div>
                <div class="flex shrink-0 items-center gap-2 sm:gap-3">
                    <livewire:dark-mode wire:key='header-dark-mode' />
                    <div class="hidden h-5 w-px bg-current opacity-20 sm:block"></div>
                    <button type="button" @click="closeExpand"
                        class="flex h-9 w-9 items-center justify-center rounded-full saturn-text transition-colors hover:saturn-bg-accent"
                        aria-label="{{ __('Close') }}">
                        <x-ui.ionicon icon="close-outline" class="h-5 w-5" />
                    </button>
                </div>
            </div>

            <div class="p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- General -->
                    <div class="space-y-1">
                        <h3 class="mb-3 text-[10px] font-semibold uppercase tracking-widest saturn-text-accent">
                            {{ __('General') }}</h3>
                        <x-ui.link href="{{ route('filament.admin.pages.dashboard') }}" icon="home-outline"
                            text="Dashboard Max" />
                        <x-ui.link href="{{ MediaResource::getUrl('index') }}" icon="images-outline"
                            text="{{ __('Media') }}" />
                        <x-ui.link href="{{ PageResource::getUrl('index') }}" icon="brush-outline"
                            text="{{ __('Theme Switch') }}" />
                        <x-ui.link
                            href="{{ SettingResource::getUrl('edit-maintenance-section', ['record' => $settingId]) }}"
                            icon="construct-outline" text="{{ __('Maintenance Mode') }}" />
                        <x-ui.link
                            href="{{ SettingResource::getUrl('edit-security', ['record' => $settingId]) }}"
                            icon="lock-open-outline" text="{{ __('Account Security Manager') }}" />
                    </div>

                    <!-- Core Features -->
                    <div class="space-y-1">
                        <h3 class="mb-3 text-[10px] font-semibold uppercase tracking-widest saturn-text-accent">
                            {{ __('Core Features') }}</h3>
                        <x-ui.link href="{{ MailResource::getUrl('index') }}" icon="mail-outline"
                            text="{{ __('Mails') }}" badge="{{ $mailCount > 0 ? $mailCount : '' }}" />
                        <x-ui.link href="{{ PostResource::getUrl('index') }}"
                            icon="document-text-outline" text="{{ __('Posts') }}"
                            badge="{{ $postCount > 0 ? $postCount : '' }}" />
                        <x-ui.link href="{{ ProjectResource::getUrl('index') }}"
                            icon="briefcase-outline" text="{{ __('Projects') }}"
                            badge="{{ $projectCount > 0 ? $projectCount : '' }}" />
                        <x-ui.link href="{{ CategoryResource::getUrl('index') }}"
                            icon="pricetags-outline" text="{{ __('Categories') }}"
                            badge="{{ $categoryCount > 0 ? $categoryCount : '' }}" />
                        <x-ui.link href="{{ ProfileResource::getUrl('index') }}" icon="person-outline"
                            text="{{ __('Profile') }}" />
                        <x-ui.link href="{{ CustomerResource::getUrl('index') }}" icon="people-outline"
                            text="{{ __('Customers') }}" />
                    </div>

                    <!-- Website Design -->
                    <div class="space-y-1">
                        <h3 class="mb-3 text-[10px] font-semibold uppercase tracking-widest saturn-text-accent">
                            {{ __('Website Design') }}</h3>
                        <x-ui.link href="{{ PageResource::getUrl('index') }}" icon="document-outline"
                            text="{{ __('Pages') }}" badge="{{ $pageCount > 0 ? $pageCount : '' }}" />
                        <x-ui.link href="{{ HeroResource::getUrl('index') }}" icon="flag-outline"
                            text="{{ __('Hero Section') }}" />
                        <x-ui.link
                            href="{{ SettingResource::getUrl('edit-appearance', ['record' => $settingId]) }}"
                            icon="color-palette-outline" text="{{ __('Appearance') }}" />
                        <x-ui.link
                            href="{{ SettingResource::getUrl('edit-navigation', ['record' => $settingId]) }}"
                            icon="menu-outline" text="{{ __('Navigation') }}" />
                        <x-ui.link href="{{ SlideshowResource::getUrl('index') }}" icon="albums-outline"
                            text="{{ __('Slideshows') }}" />
                        <x-ui.link href="{{ AlertResource::getUrl('index') }}"
                            icon="alert-circle-outline" text="{{ __('Alerts') }}" />
                    </div>

                    <!-- App Sections -->
                    <div class="space-y-1">
                        <h3 class="mb-3 text-[10px] font-semibold uppercase tracking-widest saturn-text-accent">
                            {{ __('App Sections') }}</h3>
                        <x-ui.link href="{{ SectionResource::getUrl('index') }}" icon="radio-outline"
                            text="{{ __('App Sections') }}" />
                    </div>

                    <!-- Settings -->
                    <div class="space-y-1">
                        <h3 class="mb-3 text-[10px] font-semibold uppercase tracking-widest saturn-text-accent">
                            {{ __('Settings') }}</h3>
                        <x-ui.link href="{{ ActivityResource::getUrl('index') }}"
                            icon="time-outline" text="{{ __('Activity Log') }}" />
                        <x-ui.link href="{{ SettingResource::getUrl('index') }}" icon="settings-outline"
                            text="{{ __('Settings') }}" />
                        <x-ui.link href="{{ route('log-viewer.index') }}" icon="clipboard-outline"
                            text="{{ __('Log Viewer') }}" />
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="sticky bottom-0 flex items-center justify-between gap-3 border-t saturn-border p-4 saturn-bg">
                <div class="flex min-w-0 items-center gap-2.5">
                    <span
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border saturn-border bg-black/[0.04] text-xs font-semibold uppercase saturn-text dark:bg-white/[0.06]">
                        {{ Str::upper(Str::substr(auth()->user()->name ?? 'W', 0, 1)) }}
                    </span>
                    <span class="truncate text-xs font-medium saturn-text">{{ auth()->user()->name ?? config('app.name', 'Warriorfolio') }}</span>
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

<x-filament-panels::page class="fi-dashboard-page">
    <x-filament::tabs :label="__('Dashboard sections')">
        <x-filament::tabs.item
            icon="heroicon-o-bolt"
            tag="button"
            type="button"
            wire:click="$set('activeTab', 'pulse')"
            :active="$activeTab === 'pulse'"
        >
            {{ __('Pulse') }}
        </x-filament::tabs.item>

        <x-filament::tabs.item
            icon="heroicon-o-inbox"
            tag="button"
            type="button"
            wire:click="$set('activeTab', 'inbox')"
            :active="$activeTab === 'inbox'"
        >
            {{ __('Inbox') }}
        </x-filament::tabs.item>

        <x-filament::tabs.item
            icon="heroicon-o-shield-check"
            tag="button"
            type="button"
            wire:click="$set('activeTab', 'checks')"
            :active="$activeTab === 'checks'"
        >
            {{ __('System checks') }}
        </x-filament::tabs.item>

        <x-filament::tabs.item
            icon="heroicon-o-pencil-square"
            tag="button"
            type="button"
            wire:click="$set('activeTab', 'studio')"
            :active="$activeTab === 'studio'"
        >
            {{ __('Studio') }}
        </x-filament::tabs.item>

        <x-filament::tabs.item
            icon="heroicon-o-users"
            tag="button"
            type="button"
            wire:click="$set('activeTab', 'audience')"
            :active="$activeTab === 'audience'"
        >
            {{ __('Audience') }}
        </x-filament::tabs.item>

        <x-filament::tabs.item
            icon="heroicon-o-clock"
            tag="button"
            type="button"
            wire:click="$set('activeTab', 'activity')"
            :active="$activeTab === 'activity'"
        >
            {{ __('Activity') }}
        </x-filament::tabs.item>
    </x-filament::tabs>

    <div class="mt-6" wire:key="dashboard-widgets-{{ $activeTab }}">
        @if (filled($this->getActiveTabSectionTitle()))
            <div class="mb-6 space-y-1">
                <h2 class="text-base font-semibold text-gray-950 dark:text-white">
                    {{ $this->getActiveTabSectionTitle() }}
                </h2>
                @if (filled($this->getActiveTabSectionDescription()))
                    <p class="max-w-3xl text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                        {{ $this->getActiveTabSectionDescription() }}
                    </p>
                @endif
            </div>
        @endif

        @if (method_exists($this, 'filtersForm'))
            {{ $this->filtersForm }}
        @endif

        <x-filament-widgets::widgets
            :columns="$this->getColumns()"
            :data="
                [
                    ...(property_exists($this, 'filters') ? ['filters' => $this->filters] : []),
                    ...$this->getWidgetData(),
                ]
            "
            :widgets="$this->getVisibleWidgets()"
        />
    </div>
</x-filament-panels::page>

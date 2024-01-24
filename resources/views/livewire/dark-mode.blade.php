<div>
    {{-- Switch component --}}
    <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" wire:model.live='active' class="sr-only peer" checked>
        <div
            class="w-11 h-6 bg-secondary-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-800 dark:bg-secondary-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-secondary-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-secondary-600 peer-checked:bg-primary-600">
        </div>
        <span class="ms-3 text-sm font-medium text-secondary-900 dark:text-secondary-300">
            @if($active)
            <x-ui.moon-icon />
            @else
            <x-ui.sun-icon />
            @endif
        </span>
    </label>
</div>

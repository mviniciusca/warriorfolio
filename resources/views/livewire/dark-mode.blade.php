{{-- Switch component --}}
<div>
    <label class="relative -mt-5 inline-flex w-auto cursor-pointer items-center">
        <input type="checkbox" wire:model.live='active' class="peer sr-only" checked>
        <div
            class="peer h-6 w-11 rounded-full bg-secondary-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-secondary-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-primary-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-4 peer-focus:ring-primary-300 dark:border-secondary-600 dark:bg-secondary-700 dark:peer-focus:ring-primary-800 rtl:peer-checked:after:-translate-x-full">
        </div>
        <span class="ms-3 text-sm font-medium text-secondary-900 dark:text-secondary-300">
            @if($active)
            <x-ui.sun-icon />
            @else
            <x-ui.moon-icon />
            @endif
        </span>
    </label>
</div>

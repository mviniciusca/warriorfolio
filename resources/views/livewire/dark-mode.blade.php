{{-- Switch component --}}
<div>
    <label class="relative inline-flex w-auto cursor-pointer items-center">
        <input type="checkbox" wire:model.live='active' class="peer sr-only" checked>
        <span
            class="ms-3 flex items-center gap-1 rounded-full bg-transparent p-1 text-sm font-medium text-secondary-900 transition-all duration-100 hover:opacity-30 active:opacity-10 dark:text-secondary-300 dark:hover:opacity-70">
            @if ($active)
            <x-ui.sun-icon />
            @else
            <x-ui.moon-icon />
            @endif
        </span>
    </label>
</div>

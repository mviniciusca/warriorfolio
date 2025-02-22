{{-- Switch component --}}
<div>
    <label class="relative -mt-5 inline-flex w-auto cursor-pointer items-center">
        <input type="checkbox" wire:model.live='active' class="peer sr-only" checked>
        <span class="ms-3 text-sm font-medium text-secondary-900 dark:text-secondary-300">
            @if ($active)
                <x-ui.sun-icon />
            @else
                <x-ui.moon-icon />
            @endif
        </span>
    </label>
</div>

@props([
    'action',
    'afterItem' => null,
    'blocks',
    'columns' => null,
    'statePath',
    'trigger',
    'width' => null,
])

@php
    $colCount = (int) ($columns['lg'] ?? $columns['default'] ?? 4);
    $colCount = max(2, min(6, $colCount));
@endphp

<x-filament::modal :width="$width" {{ $attributes->class(['fi-fo-builder-block-picker']) }}>
    <x-slot name="trigger">
        <div class="flex w-full justify-center">
            {{ $trigger }}
        </div>
    </x-slot>

    <div class="grid gap-3" style="grid-template-columns: repeat({{ $colCount }}, minmax(0, 1fr));">
        @foreach ($blocks as $block)
            @php
                $wireClickActionArguments = ['block' => $block->getName()];

                if ($afterItem) {
                    $wireClickActionArguments['afterItem'] = $afterItem;
                }

                $wireClickActionArguments = \Illuminate\Support\Js::from($wireClickActionArguments);

                $wireClickAction = "mountFormComponentAction('{$statePath}', '{$action->getName()}', {$wireClickActionArguments})";
            @endphp

            <button
                type="button"
                class="group flex min-h-[5.5rem] flex-col items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white p-3 text-center text-xs font-medium text-gray-700 shadow-sm outline-none transition duration-75 hover:border-primary-400 hover:text-primary-700 hover:shadow-md focus-visible:ring-2 focus-visible:ring-primary-500/40 dark:border-white/10 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-primary-500/50 dark:hover:text-primary-300 dark:focus-visible:ring-primary-400/35"
                x-on:click="close"
                wire:click="{{ $wireClickAction }}"
            >
                @if ($icon = $block->getIcon())
                    <x-filament::icon
                        :icon="$icon"
                        class="h-8 w-8 text-gray-400 transition group-hover:text-primary-500 dark:text-gray-500 dark:group-hover:text-primary-400"
                    />
                @endif
                <span class="line-clamp-2 leading-snug">{{ $block->getLabel() }}</span>
            </button>
        @endforeach
    </div>
</x-filament::modal>

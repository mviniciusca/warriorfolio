@php
    use Filament\Forms\Components\Actions\Action;
    use Illuminate\Support\Str;
    use Z3d0X\FilamentFabricator\Enums\BlockPickerStyle;

    $containers = $getChildComponentContainers();
    $blockPickerBlocks = $getBlockPickerBlocks();
    $blockPickerColumns = $getBlockPickerColumns();
    $blockPickerWidth = $getBlockPickerWidth();
    $blockPickerStyle = $getBlockPickerStyle();

    $showSidebar = method_exists($field, 'getShowSidebar') ? $field->getShowSidebar() : true;

    $addAction = $getAction($getAddActionName());
    $addBetweenAction = $getAction($getAddBetweenActionName());
    $cloneAction = $getAction($getCloneActionName());
    $collapseAllAction = $getAction($getCollapseAllActionName());
    $expandAllAction = $getAction($getExpandAllActionName());
    $deleteAction = $getAction($getDeleteActionName());
    $moveDownAction = $getAction($getMoveDownActionName());
    $moveUpAction = $getAction($getMoveUpActionName());
    $reorderAction = $getAction($getReorderActionName());
    $extraItemActions = $getExtraItemActions();

    $isAddable = $isAddable();
    $isCloneable = $isCloneable();
    $isCollapsible = $isCollapsible();
    $isDeletable = $isDeletable();
    $isReorderableWithButtons = $isReorderableWithButtons();
    $isReorderableWithDragAndDrop = $isReorderableWithDragAndDrop();
    $hasBlockIcons = $hasBlockIcons();

    $statePath = $getStatePath();
@endphp

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{}" {{ $attributes->merge($getExtraAttributes(), escape: false)->class(['fi-fo-builder']) }}>
        <div @class([
            'grid gap-6 lg:gap-8',
            'lg:grid-cols-12' => $isAddable && $showSidebar,
        ])>
            {{-- Biblioteca de módulos (desktop): inserção com um clique, filtro local --}}
            @if ($isAddable && $showSidebar)
                <aside class="hidden lg:col-span-4 xl:col-span-3 lg:block" x-data="{ moduleSearch: '' }">
                    <div
                        class="sticky top-4 flex max-h-[calc(100vh-7rem)] flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm ring-1 ring-gray-950/5 dark:border-white/10 dark:bg-gray-900 dark:ring-white/10"
                    >
                        <div class="border-b border-gray-100 px-4 py-3 dark:border-white/10">
                            <h3 class="text-sm font-semibold text-gray-950 dark:text-white">
                                {{ __('Module library') }}
                            </h3>
                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                {{ __('Click to append to the page. Drag blocks in the canvas to reorder.') }}
                            </p>
                            <label class="mt-3 block">
                                <span class="sr-only">{{ __('Filter modules') }}</span>
                                <input
                                    type="search"
                                    x-model="moduleSearch"
                                    placeholder="{{ __('Search modules…') }}"
                                    class="fi-input block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-950 placeholder:text-gray-400 focus:border-primary-500 focus:outline-none focus:ring-1 focus:ring-primary-500/40 dark:border-white/10 dark:bg-white/5 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-primary-400 dark:focus:ring-primary-400/35"
                                />
                            </label>
                        </div>
                        <div class="min-h-0 flex-1 overflow-y-auto p-3">
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($blockPickerBlocks as $block)
                                    @php
                                        $wireClickActionArguments = ['block' => $block->getName()];
                                        $wireClickActionArguments = \Illuminate\Support\Js::from($wireClickActionArguments);
                                        $wireClickAction = "mountFormComponentAction('{$statePath}', '{$addAction->getName()}', {$wireClickActionArguments})";
                                        $searchHaystack = Str::lower(strip_tags($block->getLabel()));
                                    @endphp
                                    <button
                                        type="button"
                                        data-module-search="{{ e($searchHaystack) }}"
                                        x-show="! moduleSearch.trim() || $el.dataset.moduleSearch.includes(moduleSearch.toLowerCase().trim())"
                                        class="flex flex-col items-center gap-2 rounded-lg border border-gray-200 bg-gray-50/80 p-2.5 text-center text-[11px] font-medium leading-tight text-gray-800 transition hover:border-primary-400 hover:bg-white hover:shadow-sm dark:border-white/10 dark:bg-white/5 dark:text-gray-200 dark:hover:border-primary-500/40 dark:hover:bg-white/10"
                                        wire:click="{{ $wireClickAction }}"
                                    >
                                        @if ($icon = $block->getIcon())
                                            <x-filament::icon
                                                :icon="$icon"
                                                class="h-6 w-6 shrink-0 text-gray-500 dark:text-gray-400"
                                            />
                                        @endif
                                        <span class="line-clamp-2">{{ $block->getLabel() }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>
            @endif

            <div @class([
                'min-w-0',
                'lg:col-span-8 xl:col-span-9' => $isAddable && $showSidebar,
                'col-span-12' => ! $isAddable || ! $showSidebar,
            ])>
                <div class="space-y-4">
                    @if (count($containers))
                        <div
                            class="flex flex-wrap items-center justify-between gap-2 rounded-lg border border-dashed border-gray-200 bg-gray-50/50 px-3 py-2 text-xs text-gray-600 dark:border-white/10 dark:bg-white/5 dark:text-gray-400"
                        >
                            <span>{{ __('Canvas: :count blocks', ['count' => count($containers)]) }}</span>
                            @if ($isCollapsible && ($collapseAllAction->isVisible() || $expandAllAction->isVisible()))
                                <div @class(['flex flex-wrap gap-2', 'hidden' => count($containers) < 2])>
                                    @if ($collapseAllAction->isVisible())
                                        <span x-on:click="$dispatch('builder-collapse', '{{ $statePath }}')">
                                            {{ $collapseAllAction }}
                                        </span>
                                    @endif
                                    @if ($expandAllAction->isVisible())
                                        <span x-on:click="$dispatch('builder-expand', '{{ $statePath }}')">
                                            {{ $expandAllAction }}
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endif

                    @if (count($containers))
                        <ul
                            x-sortable
                            data-sortable-animation-duration="{{ $getReorderAnimationDuration() }}"
                            wire:end.stop="{{ 'mountFormComponentAction(\'' . $statePath . '\', \'reorder\', { items: $event.target.sortable.toArray() })' }}"
                            class="space-y-4"
                        >
                            @php
                                $hasBlockLabels = $hasBlockLabels();
                                $hasBlockNumbers = $hasBlockNumbers();
                            @endphp

                            @foreach ($containers as $uuid => $item)
                                @php
                                    $visibleExtraItemActions = array_filter(
                                        $extraItemActions,
                                        fn (Action $action): bool => $action(['item' => $uuid])->isVisible(),
                                    );
                                @endphp

                                <li
                                    wire:key="{{ $this->getId() }}.{{ $item->getStatePath() }}.{{ $field::class }}.item"
                                    x-data="{ isCollapsed: @js($isCollapsed($item)) }"
                                    x-on:builder-expand.window="$event.detail === '{{ $statePath }}' && (isCollapsed = false)"
                                    x-on:builder-collapse.window="$event.detail === '{{ $statePath }}' && (isCollapsed = true)"
                                    x-on:expand="isCollapsed = false"
                                    x-sortable-item="{{ $uuid }}"
                                    class="fi-fo-builder-item overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-white/5 dark:ring-white/10"
                                    x-bind:class="{ 'fi-collapsed overflow-hidden': isCollapsed }"
                                >
                                    @if ($isReorderableWithDragAndDrop || $isReorderableWithButtons || $hasBlockLabels || $hasBlockIcons || $isCloneable || $isDeletable || $isCollapsible || count($visibleExtraItemActions))
                                        <div
                                            class="fi-fo-builder-item-header flex items-center gap-x-3 overflow-hidden px-4 py-3"
                                        >
                                            @if ($isReorderableWithDragAndDrop || $isReorderableWithButtons)
                                                <ul class="flex items-center gap-x-3">
                                                    @if ($isReorderableWithDragAndDrop)
                                                        <li x-sortable-handle>
                                                            {{ $reorderAction }}
                                                        </li>
                                                    @endif
                                                    @if ($isReorderableWithButtons)
                                                        <li>
                                                            {{ $moveUpAction(['item' => $uuid])->disabled($loop->first) }}
                                                        </li>
                                                        <li>
                                                            {{ $moveDownAction(['item' => $uuid])->disabled($loop->last) }}
                                                        </li>
                                                    @endif
                                                </ul>
                                            @endif

                                            @php
                                                $blockIcon = $item->getParentComponent()->getIcon($item->getRawState(), $uuid);
                                            @endphp

                                            @if ($hasBlockIcons && filled($blockIcon))
                                                <x-filament::icon
                                                    :icon="$blockIcon"
                                                    class="fi-fo-builder-item-header-icon h-5 w-5 shrink-0 text-gray-400 dark:text-gray-500"
                                                />
                                            @endif

                                            @if ($hasBlockLabels)
                                                <h4
                                                    @if ($isCollapsible)
                                                        x-on:click.stop="isCollapsed = !isCollapsed"
                                                    @endif
                                                    @class([
                                                        'min-w-0 text-sm font-medium text-gray-950 dark:text-white',
                                                        'truncate' => $isBlockLabelTruncated(),
                                                        'cursor-pointer select-none' => $isCollapsible,
                                                    ])
                                                >
                                                    {{ $item->getParentComponent()->getLabel($item->getRawState(), $uuid) }}
                                                    @if ($hasBlockNumbers)
                                                        <span class="text-gray-400 dark:text-gray-500">{{ $loop->iteration }}</span>
                                                    @endif
                                                </h4>
                                            @endif

                                            @if ($isCloneable || $isDeletable || $isCollapsible || count($visibleExtraItemActions))
                                                <ul class="ms-auto flex items-center gap-x-3">
                                                    @foreach ($visibleExtraItemActions as $extraItemAction)
                                                        <li>
                                                            {{ $extraItemAction(['item' => $uuid]) }}
                                                        </li>
                                                    @endforeach
                                                    @if ($isCloneable)
                                                        <li>
                                                            {{ $cloneAction(['item' => $uuid]) }}
                                                        </li>
                                                    @endif
                                                    @if ($isDeletable)
                                                        <li>
                                                            {{ $deleteAction(['item' => $uuid]) }}
                                                        </li>
                                                    @endif
                                                    @if ($isCollapsible)
                                                        <li
                                                            class="relative transition"
                                                            x-on:click.stop="isCollapsed = !isCollapsed"
                                                            x-bind:class="{ '-rotate-180': isCollapsed }"
                                                        >
                                                            <div
                                                                class="transition"
                                                                x-bind:class="{ 'pointer-events-none opacity-0': isCollapsed }"
                                                            >
                                                                {{ $getAction('collapse') }}
                                                            </div>
                                                            <div
                                                                class="absolute inset-0 rotate-180 transition"
                                                                x-bind:class="{ 'pointer-events-none opacity-0': ! isCollapsed }"
                                                            >
                                                                {{ $getAction('expand') }}
                                                            </div>
                                                        </li>
                                                    @endif
                                                </ul>
                                            @endif
                                        </div>
                                    @endif

                                    <div
                                        x-show="! isCollapsed"
                                        class="fi-fo-builder-item-content border-t border-gray-100 p-4 dark:border-white/10"
                                    >
                                        {{ $item }}
                                    </div>
                                </li>

                                @if (! $loop->last)
                                    @if ($isAddable && $addBetweenAction->isVisible())
                                        <li class="relative -my-1 flex justify-center py-1">
                                            <div
                                                class="flex w-full max-w-md justify-center rounded-lg border border-dashed border-gray-200 bg-gray-50/80 py-1 opacity-60 transition hover:opacity-100 dark:border-white/10 dark:bg-white/5"
                                            >
                                                <div class="fi-fo-builder-block-picker-ctn rounded-md bg-transparent">
                                                    @if ($blockPickerStyle === BlockPickerStyle::Dropdown)
                                                        <x-filament-fabricator::forms.components.page-builder.dropdown-block-picker
                                                            :action="$addBetweenAction"
                                                            :after-item="$uuid"
                                                            :columns="$blockPickerColumns"
                                                            :blocks="$blockPickerBlocks"
                                                            :state-path="$statePath"
                                                            :width="$blockPickerWidth"
                                                        >
                                                            <x-slot name="trigger">
                                                                {{ $addBetweenAction }}
                                                            </x-slot>
                                                        </x-filament-fabricator::forms.components.page-builder.dropdown-block-picker>
                                                    @elseif ($blockPickerStyle === BlockPickerStyle::Modal)
                                                        @include(
                                                            'vendor.filament-fabricator.components.forms.components.page-builder.modal-block-picker',
                                                            [
                                                                'action' => $addBetweenAction,
                                                                'afterItem' => $uuid,
                                                                'columns' => $blockPickerColumns,
                                                                'blocks' => $blockPickerBlocks,
                                                                'statePath' => $statePath,
                                                                'width' => $blockPickerWidth,
                                                                'trigger' => $addBetweenAction,
                                                            ]
                                                        )
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    @elseif (filled($labelBetweenItems = $getLabelBetweenItems()))
                                        <li class="relative border-t border-gray-200 dark:border-white/10">
                                            <span class="absolute -top-3 left-3 bg-white px-1 text-sm font-medium dark:bg-gray-900">
                                                {{ $labelBetweenItems }}
                                            </span>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    @endif

                    @if ($isAddable)
                        <div
                            class="rounded-xl border border-dashed border-gray-300 bg-gray-50/30 p-4 dark:border-white/10 dark:bg-white/[0.02]"
                        >
                            @if ($blockPickerStyle === BlockPickerStyle::Dropdown)
                                <x-filament-fabricator::forms.components.page-builder.dropdown-block-picker
                                    :action="$addAction"
                                    :blocks="$blockPickerBlocks"
                                    :columns="$blockPickerColumns"
                                    :state-path="$statePath"
                                    :width="$blockPickerWidth"
                                    class="flex justify-center"
                                >
                                    <x-slot name="trigger">
                                        {{ $addAction }}
                                    </x-slot>
                                </x-filament-fabricator::forms.components.page-builder.dropdown-block-picker>
                            @elseif ($blockPickerStyle === BlockPickerStyle::Modal)
                                @include(
                                    'vendor.filament-fabricator.components.forms.components.page-builder.modal-block-picker',
                                    [
                                        'action' => $addAction,
                                        'afterItem' => null,
                                        'columns' => $blockPickerColumns,
                                        'blocks' => $blockPickerBlocks,
                                        'statePath' => $statePath,
                                        'width' => $blockPickerWidth,
                                        'trigger' => $addAction,
                                    ]
                                )
                            @endif
                            <p class="mt-3 text-center text-xs text-gray-500 dark:text-gray-400 lg:hidden">
                                {{ __('Tip: on large screens the module library is pinned on the left for faster insertion.') }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-dynamic-component>

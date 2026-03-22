@php
    $cardBase =
        'group relative flex flex-col gap-1.5 rounded-lg border border-neutral-200 bg-white px-3 py-3 text-start shadow-sm transition dark:border-neutral-800 dark:bg-neutral-950 dark:shadow-none';
    $cardHover =
        'hover:border-neutral-300 hover:bg-neutral-50 dark:hover:border-neutral-700 dark:hover:bg-neutral-900/80';
    $titleClass = 'text-sm font-semibold leading-tight text-neutral-950 dark:text-white';
    $hintClass = 'text-xs font-medium leading-snug';
@endphp

<x-filament-widgets::widget>
    <div class="fi-wi-pulse-quick-actions space-y-3">
        <div>
            <h3 class="text-base font-semibold text-gray-950 dark:text-white">
                {{ __('Quick actions') }}
            </h3>
            <p class="mt-0.5 text-sm text-gray-500 dark:text-gray-400">
                {{ __('Compact tiles like your Pulse stats—jump to module toggles below or open GitHub integration.') }}
            </p>
        </div>

        <div
            class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-3 lg:grid-cols-4 xl:grid-cols-8"
            wire:key="pulse-quick-actions-{{ $maintenanceActive ? '1' : '0' }}"
        >
            <a
                wire:navigate
                href="{{ $createProjectUrl }}"
                @class([$cardBase, $cardHover, 'ring-1 ring-transparent focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/50'])
            >
                <x-filament::icon
                    icon="heroicon-o-rocket-launch"
                    class="h-5 w-5 shrink-0 text-emerald-600 dark:text-emerald-400"
                />
                <span @class([$titleClass])>{{ __('New project') }}</span>
                <span @class([$hintClass, 'text-emerald-600 dark:text-emerald-400'])>
                    {{ __('Portfolio') }}
                </span>
            </a>

            <a
                wire:navigate
                href="{{ $createPageUrl }}"
                @class([$cardBase, $cardHover, 'ring-1 ring-transparent focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/50'])
            >
                <x-filament::icon
                    icon="heroicon-o-document-plus"
                    class="h-5 w-5 shrink-0 text-primary-600 dark:text-primary-400"
                />
                <span @class([$titleClass])>{{ __('New page') }}</span>
                <span @class([$hintClass, 'text-gray-500 dark:text-gray-400'])>
                    {{ __('Page builder') }}
                </span>
            </a>

            <a
                wire:navigate
                href="{{ $createNoteUrl }}"
                @class([$cardBase, $cardHover, 'ring-1 ring-transparent focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/50'])
            >
                <x-filament::icon
                    icon="heroicon-o-pencil-square"
                    class="h-5 w-5 shrink-0 text-amber-600 dark:text-amber-400"
                />
                <span @class([$titleClass])>{{ __('New note') }}</span>
                <span @class([$hintClass, 'text-amber-600 dark:text-amber-400'])>
                    {{ __('Notes') }}
                </span>
            </a>

            <a
                href="{{ $moduleVisibilityUrl }}"
                @class([
                    $cardBase,
                    $cardHover,
                    'ring-1 ring-transparent focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/50',
                ])
            >
                <x-filament::icon
                    icon="heroicon-o-cpu-chip"
                    class="h-5 w-5 shrink-0 text-violet-600 dark:text-violet-400"
                />
                <span @class([$titleClass])>{{ __('Module visibility') }}</span>
                <span @class([$hintClass, 'text-violet-600 dark:text-violet-400'])>
                    {{ __('Jump to toggles') }}
                </span>
            </a>

            @if ($githubSettingsUrl)
                <a
                    wire:navigate
                    href="{{ $githubSettingsUrl }}"
                    @class([$cardBase, $cardHover, 'ring-1 ring-transparent focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/50'])
                >
                    <x-filament::icon
                        icon="heroicon-o-code-bracket-square"
                        class="h-5 w-5 shrink-0 text-gray-500 dark:text-gray-400"
                    />
                    <span @class([$titleClass])>{{ __('GitHub repository') }}</span>
                    <span @class([$hintClass, 'text-emerald-600 dark:text-emerald-400'])>
                        {{ $githubUsername ? '@' . $githubUsername : __('API & repos') }}
                    </span>
                </a>
            @else
                <div @class([$cardBase, 'cursor-not-allowed opacity-60'])>
                    <x-filament::icon
                        icon="heroicon-o-code-bracket-square"
                        class="h-5 w-5 shrink-0 text-gray-400"
                    />
                    <span @class([$titleClass])>{{ __('GitHub repository') }}</span>
                    <span @class([$hintClass, 'text-gray-400'])>{{ __('Unavailable') }}</span>
                </div>
            @endif

            <button
                type="button"
                wire:click="toggleMaintenance"
                wire:loading.attr="disabled"
                @class([
                    $cardBase,
                    $cardHover,
                    'w-full cursor-pointer text-left ring-1 ring-transparent focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/50',
                ])
            >
                <x-filament::icon
                    :icon="$maintenanceActive ? 'heroicon-o-shield-exclamation' : 'heroicon-o-check-circle'"
                    @class([
                        'h-5 w-5 shrink-0',
                        $maintenanceActive
                            ? 'text-amber-600 dark:text-amber-400'
                            : 'text-emerald-600 dark:text-emerald-400',
                    ])
                />
                <span @class([$titleClass])>
                    {{ $maintenanceActive ? __('Maintenance on') : __('Site live') }}
                </span>
                <span
                    @class([
                        $hintClass,
                        $maintenanceActive
                            ? 'text-amber-600 dark:text-amber-400'
                            : 'text-emerald-600 dark:text-emerald-400',
                    ])
                >
                    {{ $maintenanceActive ? __('Click to go live') : __('Click for maintenance') }}
                </span>
            </button>

            @if ($editProfileUrl)
                <a
                    wire:navigate
                    href="{{ $editProfileUrl }}"
                    @class([$cardBase, $cardHover, 'ring-1 ring-transparent focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/50'])
                >
                    <x-filament::icon
                        icon="heroicon-o-identification"
                        class="h-5 w-5 shrink-0 text-gray-500 dark:text-gray-400"
                    />
                    <span @class([$titleClass])>{{ __('Edit profile') }}</span>
                    <span @class([$hintClass, 'text-gray-500 dark:text-gray-400'])>
                        {{ __('Bio & role') }}
                    </span>
                </a>
            @else
                <div @class([$cardBase, 'cursor-not-allowed opacity-60'])>
                    <x-filament::icon
                        icon="heroicon-o-identification"
                        class="h-5 w-5 shrink-0 text-gray-400"
                    />
                    <span @class([$titleClass])>{{ __('Edit profile') }}</span>
                    <span @class([$hintClass, 'text-gray-400'])>{{ __('Unavailable') }}</span>
                </div>
            @endif

            @if ($editSocialUrl)
                <a
                    wire:navigate
                    href="{{ $editSocialUrl }}"
                    @class([$cardBase, $cardHover, 'ring-1 ring-transparent focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/50'])
                >
                    <x-filament::icon
                        icon="heroicon-o-share"
                        class="h-5 w-5 shrink-0 text-sky-600 dark:text-sky-400"
                    />
                    <span @class([$titleClass])>{{ __('Social links') }}</span>
                    <span @class([$hintClass, 'text-sky-600 dark:text-sky-400'])>
                        {{ __('Networks') }}
                    </span>
                </a>
            @else
                <div @class([$cardBase, 'cursor-not-allowed opacity-60'])>
                    <x-filament::icon icon="heroicon-o-share" class="h-5 w-5 shrink-0 text-gray-400" />
                    <span @class([$titleClass])>{{ __('Social links') }}</span>
                    <span @class([$hintClass, 'text-gray-400'])>{{ __('Unavailable') }}</span>
                </div>
            @endif
        </div>
    </div>
</x-filament-widgets::widget>

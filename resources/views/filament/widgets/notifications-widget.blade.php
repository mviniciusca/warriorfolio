@php
    $checksDescription =
        __('We run automated checks on PHP, files, mail, sessions, production settings, and more. Dismiss an item to hide it for 30 days.')
        .' ';
    $checksDescription .= $notifications->isEmpty()
        ? __('Everything we scanned looks fine right now.')
        : trans_choice(
            '{1} :count issue needs attention|[2,*] :count issues need attention',
            $notifications->count(),
            ['count' => $notifications->count()],
        );
@endphp

<x-filament-widgets::widget>
    <div wire:key="notifications-widget-{{ $renderVersion }}">
        <x-filament::section
            :heading="__('System checks')"
            :description="$checksDescription"
            icon="heroicon-o-shield-check"
        >
            @if ($notifications->isEmpty())
                <div class="flex flex-col items-center justify-center gap-3 py-10 text-center">
                    <x-filament::icon
                        icon="heroicon-o-check-circle"
                        class="h-14 w-14 text-success-500 dark:text-success-400"
                    />
                    <p class="text-sm font-medium text-gray-950 dark:text-white">
                        {{ __('No automated warnings at the moment.') }}
                    </p>
                    <p class="max-w-md text-sm text-gray-500 dark:text-gray-400">
                        {{ __('We scan PHP extensions, disk and permissions, Laravel maintenance/Vite builds, database drivers, sessions, mail, ReCAPTCHA, OPcache, SMTP, production toggles, and inbox backlog. Dismissals are remembered for 30 days.') }}
                    </p>
                </div>
            @else
                <ul class="divide-y divide-gray-200 dark:divide-white/10">
                    @foreach ($notifications as $notification)
                        <li class="flex gap-3 py-4 first:pt-0 last:pb-0">
                            <div class="shrink-0 pt-0.5">
                                @php
                                    $iconTone = match ($notification['color'] ?? 'gray') {
                                        'danger' => 'text-danger-600 dark:text-danger-400',
                                        'warning' => 'text-warning-600 dark:text-warning-400',
                                        'success' => 'text-success-600 dark:text-success-400',
                                        default => 'text-primary-600 dark:text-primary-400',
                                    };
                                @endphp
                                <x-filament::icon
                                    :icon="$notification['icon']"
                                    @class(['h-6 w-6', $iconTone])
                                />
                            </div>

                            <div class="min-w-0 flex-1 space-y-1">
                                @if (filled($notification['url'] ?? null))
                                    <a
                                        href="{{ $notification['url'] }}"
                                        class="block rounded-md outline-none ring-primary-600 focus-visible:ring-2 dark:ring-primary-500"
                                    >
                                        <p class="font-semibold text-gray-950 dark:text-white">
                                            {{ $notification['title'] }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $notification['message'] }}
                                        </p>
                                    </a>
                                @else
                                    <p class="font-semibold text-gray-950 dark:text-white">
                                        {{ $notification['title'] }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $notification['message'] }}
                                    </p>
                                @endif
                            </div>

                            <div class="shrink-0">
                                <x-filament::icon-button
                                    wire:click="dismissNotification('{{ $notification['id'] }}')"
                                    :label="__('Dismiss')"
                                    icon="heroicon-o-x-mark"
                                    color="gray"
                                    size="sm"
                                />
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </x-filament::section>
    </div>
</x-filament-widgets::widget>

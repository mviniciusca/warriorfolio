<x-filament-widgets::widget>
    @if (count($notifications))
        <x-filament::section :heading="__('System Notifications')" :description="__('Notifications from your application.')" :icon="'heroicon-o-bell'" :collapsible='true'>
            <div class="filament-notifications-widget">
                <div class="space-y-4 p-2">
                    <div class="notification-stack relative">
                        @foreach ($notifications as $index => $notification)
                            <div class="notification-card w-full rounded-lg border-none bg-transparent p-3 transition-all duration-200 ease-in-out"
                                style="z-index: {{ count($notifications) - $index }}; top: {{ $index * 6 }}px; opacity: {{ 1 - $index * 0.15 }};"
                                x-data="{ hovered: false }" x-on:mouseenter="hovered = true" x-on:mouseleave="hovered = false"
                                x-bind:style="hovered ? 'top: 0px; z-index: 100; opacity: 1;' :
                                    'top: {{ $index * 6 }}px; z-index: {{ count($notifications) - $index }}; opacity: {{ 1 - $index * 0.15 }};'">
                                <div class="flex items-start gap-3">
                                    <div class="shrink-0">
                                        @php
                                            $iconClasses =
                                                [
                                                    'primary' => 'text-primary-500',
                                                    'success' => 'text-success-500',
                                                    'warning' => 'text-warning-500',
                                                    'danger' => 'text-danger-500',
                                                ][$notification['color']] ?? 'text-primary-500';
                                        @endphp
                                        <x-dynamic-component :component="$notification['icon']" class="{{ $iconClasses }} h-6 w-6" />
                                    </div>

                                    <div class="grow">
                                        <a href="{{ $notification['url'] ?? '#' }}">
                                            <p class="font-medium">{{ $notification['title'] }}</p>
                                            <p class="text-sm text-gray-500">{{ $notification['message'] }}</p>
                                        </a>
                                    </div>

                                    <button wire:click="dismissNotification('{{ $notification['id'] }}')"
                                        class="shrink-0 text-gray-400 hover:text-gray-600" title="{{ __('Dismiss') }}">
                                        <x-heroicon-o-x-mark class="h-5 w-5" />
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-filament::section>

        <style>
            .notification-stack {
                height: auto;
                padding-top: 5px;
                position: relative;
            }

            .notification-card {
                position: relative;
            }
        </style>
    @endif
</x-filament-widgets::widget>

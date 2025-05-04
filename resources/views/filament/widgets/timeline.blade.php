<x-filament::widget>
    <x-filament::card>
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-bold tracking-tight">Activity Timeline</h2>
            </div>

            <div class="space-y-4">
                @foreach ($events as $event)
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <div @class([ 'rounded-full p-2' , 'bg-success-100 dark:bg-success-500/20'=> $event['color'] ===
                            'success',
                            'bg-info-100 dark:bg-info-500/20' => $event['color'] === 'info',
                            'bg-warning-100 dark:bg-warning-500/20' => $event['color'] === 'warning',
                            ])>
                            <x-filament::icon :name="$event['icon']" @class([ 'h-5 w-5'
                                , 'text-success-600 dark:text-success-400'=> $event['color'] === 'success',
                                'text-info-600 dark:text-info-400' => $event['color'] === 'info',
                                'text-warning-600 dark:text-warning-400' => $event['color'] === 'warning',
                                ])
                                />
                        </div>
                    </div>

                    <div class="flex-1 space-y-1">
                        <p class="text-sm font-medium">
                            {{ $event['title'] }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $event['date']->diffForHumans() }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>

@props(['is_dismissible' => null, 'is_active' => null])

<div>
    <div id="wrapper-{{ $id }}">

        @if($display && $is_active)

        @if($style == 'default')
        <div id="{{ $id }}" tabindex="-1"
            class="animate__animated animate__fadeInUp animate__delay-1s fixed bottom-0 z-50 mx-auto w-full border-t bg-secondary-100 bg-contain bg-center bg-no-repeat dark:border-t-secondary-600 dark:bg-secondary-800">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-2 px-5 py-4 text-xs font-light">
                <div class="alert-content">
                    {!! $message !!}
                </div>
                <div class="my-4">
                    @if ($is_dismissible)
                    <x-ui.button class="px-3 py-2 text-xs" wire:click="close">Accept</x-ui.button>
                    @endif
                </div>
            </div>
        </div>
        @endif

        @if($style == 'bumper')
        <div id="{{ $id }}" tabindex="-1"
            class="animate__animated animate__fadeInDown animate__delay-1s fixed top-0 z-50 mx-auto w-full rounded-lg bg-secondary-100 bg-contain bg-center bg-no-repeat dark:border-secondary-800 dark:bg-secondary-800">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-2 px-5 py-4 text-xs font-light">
                <div class="alert-content">
                    {!! $message !!}
                </div>
                <div class="my-4">
                    @if ($is_dismissible)
                    <x-ui.button class="px-3 py-2 text-xs" wire:click="close">Accept</x-ui.button>
                    @endif
                </div>
            </div>
        </div>
        @endif


        @if($style == 'banner')
        <x-ui.alert icon='notifications-outline'>
            <div class="alert-content">
                {!! $message !!}
            </div>
            @if($is_dismissible)
            <x-ui.ionicon class="cursor-pointer hover:opacity-30" wire:click='close' icon="close-outline" />
            @endif
        </x-ui.alert>
        @endif

        @if($style == 'toast')
        <div id="{{ $id }}" tabindex="-1"
            class="animate__animated animate__fadeInUp animate__delay-1s fixed bottom-5 right-5 z-50 mx-auto max-w-2xl bg-secondary-50 dark:bg-secondary-800">
            <div
                class="mx-auto flex max-w-3xl flex-wrap items-center justify-between gap-2 rounded-lg border border-secondary-200 px-5 py-4 text-xs font-light dark:border-secondary-700">
                <div class="alert-content">
                    {!! $message !!}
                </div>
                <div class="py-2">
                    @if ($is_dismissible)
                    <x-ui.button class="px-3 py-2 text-xs" wire:click="close">Close</x-ui.button>
                    @endif
                </div>
            </div>
        </div>
        @endif


        @endif

    </div>
</div>

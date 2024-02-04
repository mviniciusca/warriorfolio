@props(['is_dismissible' => null, 'is_active' => null])
<div>
    <div id="wrapper-{{ $id }}">

        @if($display && $is_active)

        @if($style == 'default')
        <div id="{{ $id }}" tabindex="-1"
            class="animate__animated animate__fadeInUp animate__delay-4s fixed bottom-5 right-5 z-50 mx-auto max-w-xl items-start justify-between gap-8 rounded-lg border border-b border-gray-200 bg-gray-50 bg-contain bg-center bg-no-repeat px-4 py-3 dark:border-secondary-800 dark:bg-secondary-950 sm:items-center lg:py-4">
            <span class="flex items-center gap-2 text-sm font-light">
                {!! $message !!}
                @if($is_dismissible)
                <x-ui.button class="px-3 py-2 text-xs" wire:click="close">Accept</x-ui.button>
                @endif
            </span>
        </div>
        @endif

        @if($style == 'bumper')
        {{-- Bumper a banner on Top --}}
        <div id="{{ $id }}" tabindex="-1"
            class="animate__animated animate__fadeInDown animate__delay-4s fixed left-0 right-0 top-0 z-50 mx-auto max-w-xl items-start justify-between gap-8 rounded-lg border border-b border-gray-200 bg-gray-50 bg-contain bg-center bg-no-repeat px-4 py-3 dark:border-secondary-800 dark:bg-secondary-950 sm:items-center lg:py-4">
            <span class="flex items-center gap-2 text-sm font-light">
                {!! $message !!}
                @if ($is_dismissible)
                <x-ui.button class="px-3 py-2 text-xs" wire:click="close">Accept</x-ui.button>
                @endif
            </span>
        </div>
        @endif


        @if($style == 'modal')
        <div id="{{ $id }}"
            class="fixed inset-0 z-50 overflow-y-auto bg-secondary-950 bg-opacity-10 dark:bg-opacity-70">
            <div class="flex min-h-screen items-center justify-center">
                <div
                    class="animate__animated animate__fadeIn relative m-4 w-full max-w-2xl rounded-lg bg-secondary-100 p-8 dark:bg-secondary-800">
                    <div class="flex flex-wrap text-sm">

                        @if($is_dismissible)
                        <x-ui.ionicon class="absolute right-5 top-5 h-6 w-6 cursor-pointer text-2xl hover:opacity-30"
                            wire:click='close' icon="close-outline" />
                        @endif

                        <div class="modal-alert py-4">{!! $message !!}</div>
                    </div>

                </div>
            </div>
        </div>
        @endif


        @if($style == 'banner')

        <x-ui.alert icon='notifications-outline'>

            {!! $message !!}

            @if($is_dismissible)
            <x-ui.ionicon class="cursor-pointer hover:opacity-30" wire:click='close' icon="close-outline" />
            @endif

        </x-ui.alert>
        @endif


        @endif

    </div>
</div>

@props(['is_dismissible' => null, 'is_active' => null, 'button_text' => null])

<div>
    <div id="wrapper-{{ $id }}">

        @if($display && $is_active)

        @if($style == 'default')
        <div id="{{ $id }}" tabindex="-1"
            class="animate__animated animate__fadeInUp animate__delay-1s fixed bottom-0 z-50 mx-auto w-full border-t bg-secondary-100 bg-contain bg-center bg-no-repeat dark:border-t-secondary-800 dark:bg-secondary-950">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-2 px-5 py-2 text-xs">
                <div class="alert-content">
                    {!! $message !!}
                </div>
                <div class="my-4">
                    @if ($is_dismissible)

                    @if($button_text)
                    <x-ui.button class="rounded-md px-2 py-1 text-xs" wire:click="close">
                        {{ $button_text }}
                    </x-ui.button>
                    @else
                    <x-ui.ionicon class="cursor-pointer" icon="close-outline" wire:click="close" />
                    @endif

                    @endif
                </div>
            </div>
        </div>
        @endif

        @if($style == 'bumper')
        <div id="{{ $id }}" tabindex="-1"
            class="animate__animated animate__fadeInDown animate__delay-1s fixed top-0 z-50 mx-auto w-full rounded-lg bg-secondary-100 bg-contain bg-center bg-no-repeat text-xs dark:border-b dark:border-b-secondary-800 dark:bg-secondary-950">
            <div class="mx-auto flex max-w-7xl items-center justify-between gap-2 px-5 py-2">
                <div class="alert-content">
                    {!! $message !!}
                </div>
                <div class="my-4">
                    @if ($is_dismissible)
                    @if($button_text)
                    <x-ui.button class="rounded-md px-2 py-1 text-xs" wire:click="close">
                        {{ $button_text }}
                    </x-ui.button>
                    @else
                    <x-ui.ionicon class="cursor-pointer" icon="close-outline" wire:click="close" />
                    @endif
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
            @if($button_text)
            <x-ui.button class="rounded-md px-2 py-1 text-xs" wire:click="close">
                {{ $button_text }}
            </x-ui.button>
            @else
            <x-ui.ionicon class="cursor-pointer" icon="close-outline" wire:click="close" />
            @endif
            @endif
        </x-ui.alert>
        @endif

        @if($style == 'toast')
        <div id="{{ $id }}" tabindex="-1"
            class="animate__animated animate__fadeInUp animate__delay-1s fixed bottom-5 right-5 z-50 mx-auto max-w-xl bg-secondary-50 text-xs dark:bg-secondary-800">
            <div
                class="mx-auto flex max-w-3xl flex-wrap items-center justify-between gap-2 rounded-lg border border-secondary-200 px-3 py-2 dark:border-secondary-700">
                <div class="alert-content">
                    {!! $message !!}
                </div>
                <div class="py-2">
                    @if ($is_dismissible)
                    @if($button_text)
                    <x-ui.button class="rounded-md px-2 py-1 text-xs" wire:click="close">
                        {{ $button_text }}
                    </x-ui.button>
                    @else
                    <x-ui.ionicon class="cursor-pointer" icon="close-outline" wire:click="close" />
                    @endif
                    @endif
                </div>
            </div>
        </div>
        @endif


        @endif

    </div>
</div>
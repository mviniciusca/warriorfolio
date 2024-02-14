<section class="px-4 py-4 md:py-8">
    <div class="mx-auto max-w-7xl">
        <header class="mt-8 flex w-full flex-wrap items-center justify-between">
            <div class="flex flex-wrap items-center gap-4">
                <div>
                    <a href="/">
                        @if($app->logo || $app->logo_dark_mode)
                        <x-curator-glider :media="$app->logo"
                            class="block {{ $app->logo_size ? $app->logo_size : 'max-w-11' }} object-contain {{ $app->logo_dark_mode ? 'dark:hidden' : '' }}" />
                        <x-curator-glider :media="$app->logo_dark_mode"
                            class="hidden {{ $app->logo_size ? $app->logo_size : 'max-w-11' }} object-contain dark:block" />
                        @else
                        <x-ui.logo />
                        @endif
                    </a>
                </div>


                @if($navigation)
                <div class="">
                    <x-header.navigation :$navigation />
                </div>
                @endif


            </div>
            <div class="flex flex-wrap items-center">
                <livewire:dark-mode wire:key='header-dark-mode' />
            </div>
        </header>
    </div>
</section>

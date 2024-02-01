@aware(['page'])
@props(['type' => 'button', 'icon' => null])

<div>
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-x-4 sm:space-y-0 lg:mb-4">

            <x-ui.button class="px-4 py-3 text-sm" icon="chevron-down-outline">
                Check it Out
            </x-ui.button>

            <x-ui.button-alt class="px-4 py-3 text-sm" icon="chevron-forward-outline">
                Learn More
            </x-ui.button-alt>

        </div>
    </div>
</div>

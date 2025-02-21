@aware(['page'])
@props(['vertical_space' => 'py-1 md:py-2 lg:py-4'])

<div
    class="{{ $vertical_space === 'xs' ? 'py-1 md:py-2 lg:py-4' : ($vertical_space === 'sm' ? 'py-3 md:py-6 lg:py-12' : ($vertical_space === 'md' ? 'py-6 md:py-12 lg:py-24' : ($vertical_space === 'lg' ? 'py-12 md:py-24 lg:py-48' : 'py-24 md:py-48 lg:py-96'))) }} w-full">
</div>

@aware(['page'])

<section {{ $attributes->merge(['class' => 'w-full py-12']) }}>
    <div class="px-4 py-4 md:py-8">
        <div class="max-w-7xl mx-auto">
            {{ $slot }}
        </div>
    </div>
</section>

@aware(['page'])
<section {{ $attributes->merge(['class' => 'w-full py-16']) }}>
    <div class="px-4 py-4 md:py-8">
        <div class="mx-auto max-w-7xl">
            {{ $slot }}
        </div>
    </div>
</section>

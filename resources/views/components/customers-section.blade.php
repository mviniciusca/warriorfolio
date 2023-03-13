<x-content-section
:title="'trusted by'"
:subTitle="'Trabalhei com uma ampla variedade de clientes, desde pequenas startups a grandes empresas. Cada um com suas necessidades e objetivos únicos, entregando projetos personalizados que superam as expectativas dos clientes.'"
>
    <div class="grid md:grid-cols-4 md:gap-8 justify-center items-center grid-cols-2 gap-4">

    @foreach ($customers as $customer)
        <x-ui.brands
            :cover="$customer->customer_logo"
        />
    @endforeach
 </div>
</x-content-section>

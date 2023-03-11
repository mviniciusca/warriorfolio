<x-content-section
:title="'trusted by'"
:subTitle="'Trabalhei com uma ampla variedade de clientes, desde pequenas startups a grandes empresas. Cada um com suas necessidades e objetivos únicos, entregando projetos personalizados que superam as expectativas dos clientes.'"
>
    <div class="grid grid-cols-4 gap-8 justify-center items-center">

    @foreach ($customers as $customer)
        <x-ui.brands
            :cover="$customer->customer_logo"
        />
    @endforeach
 </div>
</x-content-section>

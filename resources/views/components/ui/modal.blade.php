@props([
'id' => null,
'size' => 'md', // sm, md, lg, xl, 2xl
'overlay' => true,
'closable' => true,
'title' => null,
'footer' => null,
'centered' => true,
'autoOpen' => false, // Abrir automaticamente quando carregar
'delay' => 0, // Delay em milissegundos para abrir automaticamente
])

@php
$sizeClasses = [
'sm' => 'max-w-sm',
'md' => 'max-w-md',
'lg' => 'max-w-lg',
'xl' => 'max-w-xl',
'2xl' => 'max-w-2xl',
];

$modalSize = $sizeClasses[$size] ?? $sizeClasses['md'];
@endphp

<div x-data="{
        open: {{ $autoOpen ? 'true' : 'false' }},
        init() {
            @if($autoOpen && $delay > 0)
                setTimeout(() => {
                    this.open = true;
                }, {{ $delay }});
            @endif
        }
    }" x-on:open-{{ $id }}.window="open = true" x-on:close-{{ $id }}.window="open = false"
    x-on:keydown.escape.window="open = false" x-show="open" x-cloak class="fixed inset-0 z-50 overflow-y-auto"
    style="display: none;">
    <!-- Overlay -->
    @if($overlay)
    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 saturn-modal-bg"
        @if($closable) @click="open = false" @endif></div>
    @endif

    <!-- Modal Container -->
    <div class="flex min-h-full items-center justify-center p-6 text-center sm:p-4 relative">

        <!-- Close Button (Completely outside modal) -->
        @if($closable)
        <button @click="open = false" x-show="open"
            class="absolute top-4 right-4 z-20 rounded-full p-3 saturn-bg saturn-border saturn-text-accent hover:saturn-text hover:saturn-bg-accent transition-colors shadow-xl"
            aria-label="Fechar modal">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        @endif

        <div x-show="open" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative transform saturn-bg border saturn-border-accent overflow-hidden rounded-xl shadow-xl transition-all {{ $modalSize }} w-full"
            @click.stop>

            <!-- Header -->
            @if($title)
            <div class="px-6 py-4 border-b saturn-border-accent">
                <h3 class="text-sm font-semibold saturn-text">
                    {{ $title }}
                </h3>
            </div>
            @endif

            <!-- Body -->
            <div class="px-6 py-4">
                <div class="saturn-text">
                    {{ $slot }}
                </div>
            </div>

            <!-- Footer -->
            @if($footer)
            <div class="px-6 py-4 border-t saturn-border-accent">
                {{ $footer }}
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Função auxiliar para abrir modal
    function openModal(modalId) {
        window.dispatchEvent(new CustomEvent('open-' + modalId));
    }

    // Função auxiliar para fechar modal
    function closeModal(modalId) {
        window.dispatchEvent(new CustomEvent('close-' + modalId));
    }

    // Função global para abrir modal via Alpine
    window.openModal = openModal;
    window.closeModal = closeModal;
</script>
@endpush

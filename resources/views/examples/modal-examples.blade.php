{{--
Exemplo de uso do componente Modal

Este arquivo demonstra diferentes formas de usar o componente modal.
Você pode copiar e adaptar estes exemplos para suas necessidades.
--}}

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 saturn-text">Exemplos de Modal</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- Modal Básico --}}
        <div class="saturn-bg-accent rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 saturn-text">Modal Básico</h3>
            <button @click="$dispatch('open-modal-basic')" class="saturn-btn-primary">
                Abrir Modal Básico
            </button>
        </div>

        {{-- Modal com Título --}}
        <div class="saturn-bg-accent rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 saturn-text">Modal com Título</h3>
            <button @click="$dispatch('open-modal-with-title')" class="saturn-btn-secondary">
                Abrir Modal com Título
            </button>
        </div>

        {{-- Modal Grande --}}
        <div class="saturn-bg-accent rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 saturn-text">Modal Grande</h3>
            <button @click="$dispatch('open-modal-large')" class="saturn-btn-outlined">
                Abrir Modal Grande
            </button>
        </div>

        {{-- Modal com Footer --}}
        <div class="saturn-bg-accent rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 saturn-text">Modal com Footer</h3>
            <button @click="$dispatch('open-modal-with-footer')" class="saturn-btn-ghost">
                Abrir Modal com Footer
            </button>
        </div>

        {{-- Modal de Confirmação --}}
        <div class="saturn-bg-accent rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 saturn-text">Modal de Confirmação</h3>
            <button @click="$dispatch('open-confirmation-modal')" class="saturn-btn-primary">
                Deletar Item
            </button>
        </div>

        {{-- Modal com Formulário --}}
        <div class="saturn-bg-accent rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 saturn-text">Modal com Formulário</h3>
            <button @click="$dispatch('open-form-modal')" class="saturn-btn-secondary">
                Criar Novo Item
            </button>
        </div>

        {{-- Modal Auto-Open --}}
        <div class="saturn-bg-accent rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 saturn-text">Modal Auto-Open</h3>
            <p class="text-sm saturn-text-accent mb-3">Este modal abre automaticamente após 2 segundos</p>
            <button @click="$dispatch('open-auto-modal')" class="saturn-btn-outlined">
                Reabrir Modal Auto
            </button>
        </div>

        {{-- Modal Auto-Open Imediato --}}
        <div class="saturn-bg-accent rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 saturn-text">Modal Imediato</h3>
            <p class="text-sm saturn-text-accent mb-3">Modal que abre imediatamente ao carregar</p>
            <button @click="$dispatch('open-immediate-modal')" class="saturn-btn-ghost">
                Reabrir Modal Imediato
            </button>
        </div>
    </div>
</div>

{{-- Modais --}}

{{-- Modal Básico --}}
<x-ui.modal id="modal-basic">
    <p class="mb-4">Este é um modal básico sem título nem footer.</p>
    <p>Você pode clicar no overlay ou pressionar ESC para fechar.</p>
</x-ui.modal>

{{-- Modal com Título --}}
<x-ui.modal id="modal-with-title" title="Informações Importantes">
    <p class="mb-4">Este modal possui um título e um botão de fechar no cabeçalho.</p>
    <p>O título é passado através da prop "title".</p>
</x-ui.modal>

{{-- Modal Grande --}}
<x-ui.modal id="modal-large" size="xl" title="Modal Grande">
    <p class="mb-4">Este é um modal grande (xl). Os tamanhos disponíveis são:</p>
    <ul class="list-disc list-inside space-y-2 saturn-text-accent">
        <li><strong>sm</strong> - Pequeno</li>
        <li><strong>md</strong> - Médio (padrão)</li>
        <li><strong>lg</strong> - Grande</li>
        <li><strong>xl</strong> - Extra Grande</li>
        <li><strong>2xl</strong> - Extra Extra Grande</li>
    </ul>
</x-ui.modal>

{{-- Modal com Footer --}}
<x-ui.modal id="modal-with-footer" title="Modal com Footer">
    <p class="mb-4">Este modal possui um footer personalizado com botões de ação.</p>
    <p>O footer é definido usando o slot "footer".</p>

    <x-slot name="footer">
        <div class="flex justify-end space-x-3">
            <button @click="$dispatch('close-modal-with-footer')" class="saturn-btn-outlined">
                Cancelar
            </button>
            <button @click="$dispatch('close-modal-with-footer')" class="saturn-btn-primary">
                Confirmar
            </button>
        </div>
    </x-slot>
</x-ui.modal>

{{-- Modal de Confirmação --}}
<x-ui.modal id="confirmation-modal" size="sm" title="Confirmar Ação">
    <div class="text-center">
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900 mb-4">
            <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
            </svg>
        </div>
        <h3 class="text-lg font-medium saturn-text mb-2">Tem certeza?</h3>
        <p class="saturn-text-accent mb-6">Esta ação não pode ser desfeita. O item será permanentemente removido.</p>
    </div>

    <x-slot name="footer">
        <div class="flex justify-center space-x-3">
            <button @click="$dispatch('close-confirmation-modal')" class="saturn-btn-outlined">
                Cancelar
            </button>
            <button @click="alert('Item deletado!'); $dispatch('close-confirmation-modal')"
                class="saturn-btn-primary bg-red-600 hover:bg-red-700 border-red-600">
                Deletar
            </button>
        </div>
    </x-slot>
</x-ui.modal>

{{-- Modal com Formulário --}}
<x-ui.modal id="form-modal" size="lg" title="Criar Novo Item">
    <form @submit.prevent="alert('Formulário enviado!'); $dispatch('close-form-modal')">
        <div class="space-y-4">
            <div class="saturn-input-group">
                <label class="saturn-label">Nome do Item</label>
                <input type="text" class="saturn-input" placeholder="Digite o nome..." required>
            </div>

            <div class="saturn-input-group">
                <label class="saturn-label">Descrição</label>
                <textarea class="saturn-input" rows="3" placeholder="Digite a descrição..."></textarea>
            </div>

            <div class="saturn-input-group">
                <label class="saturn-label">Categoria</label>
                <select class="saturn-input">
                    <option value="">Selecione uma categoria</option>
                    <option value="categoria1">Categoria 1</option>
                    <option value="categoria2">Categoria 2</option>
                    <option value="categoria3">Categoria 3</option>
                </select>
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-end space-x-3">
                <button type="button" @click="$dispatch('close-form-modal')" class="saturn-btn-outlined">
                    Cancelar
                </button>
                <button type="submit" class="saturn-btn-primary">
                    Criar Item
                </button>
            </div>
        </x-slot>
    </form>
</x-ui.modal>

{{-- Modal Auto-Open com Delay --}}
<x-ui.modal id="auto-modal" title="Modal Automático" :autoOpen="true" :delay="2000">
    <div class="text-center">
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 mb-4">
            <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h3 class="text-lg font-medium saturn-text mb-2">Bem-vindo!</h3>
        <p class="saturn-text-accent mb-4">Este modal abriu automaticamente após 2 segundos de delay.</p>
        <p class="text-sm saturn-text-accent">Ideal para notificações, boas-vindas ou alertas importantes.</p>
    </div>
</x-ui.modal>

{{-- Modal Auto-Open Imediato --}}
<x-ui.modal id="immediate-modal" title="Modal Imediato" :autoOpen="true" size="sm">
    <div class="text-center">
        <div
            class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 dark:bg-green-900 mb-4">
            <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h3 class="text-lg font-medium saturn-text mb-2">Carregamento Completo!</h3>
        <p class="saturn-text-accent mb-4">Este modal abre imediatamente quando a página carrega.</p>
        <p class="text-sm saturn-text-accent">Útil para confirmações de ações ou status.</p>
    </div>

    <x-slot name="footer">
        <div class="flex justify-center">
            <button @click="$dispatch('close-immediate-modal')" class="saturn-btn-primary">
                Entendi
            </button>
        </div>
    </x-slot>
</x-ui.modal>

@endsection

@push('scripts')
<script>
    // Exemplo de como abrir modal via JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        // Você pode usar essas funções em qualquer lugar do seu código

        // Abrir modal programaticamente
        // openModal('modal-basic');

        // Fechar modal programaticamente
        // closeModal('modal-basic');

        console.log('Modais carregados! Use openModal(id) ou closeModal(id) para controlar via JS.');
    });
</script>
@endpush

# Componente Modal Saturn UI

Um componente de modal reutilizável construído com Alpine.js e estilizado com Saturn UI.

## Características

- ✅ Totalmente responsivo
- ✅ Suporte ao dark mode via Saturn UI
- ✅ Animações suaves com transições
- ✅ Fechamento via ESC, overlay ou botão
- ✅ Múltiplos tamanhos disponíveis
- ✅ Footer personalizável
- ✅ Controle via Alpine.js
- ✅ Acessibilidade integrada

## Props Disponíveis

| Prop | Tipo | Padrão | Descrição |
|------|------|--------|-----------|
| `id` | string | `modal-{uniqid}` | ID único do modal |
| `size` | string | `md` | Tamanho do modal: `sm`, `md`, `lg`, `xl`, `2xl` |
| `overlay` | boolean | `true` | Exibir overlay de fundo |
| `closable` | boolean | `true` | Permitir fechar o modal |
| `title` | string | `null` | Título do modal |
| `footer` | slot | `null` | Conteúdo do footer |
| `centered` | boolean | `true` | Centralizar o modal |
| `autoOpen` | boolean | `false` | Abrir automaticamente quando carregar |
| `delay` | integer | `0` | Delay em milissegundos para abrir automaticamente |

## Uso Básico

```blade
{{-- Modal simples --}}
<x-ui.modal id="meu-modal">
    <p>Conteúdo do modal aqui</p>
</x-ui.modal>

{{-- Botão para abrir --}}
<button @click="$dispatch('open-meu-modal')">
    Abrir Modal
</button>
```

## Exemplos de Uso

### Modal com Título

```blade
<x-ui.modal id="modal-titulo" title="Meu Título">
    <p>Conteúdo com título personalizado</p>
</x-ui.modal>
```

### Modal com Footer

```blade
<x-ui.modal id="modal-footer" title="Confirmação">
    <p>Deseja continuar com esta ação?</p>
    
    <x-slot name="footer">
        <div class="flex justify-end space-x-3">
            <button @click="$dispatch('close-modal-footer')" class="saturn-btn-outlined">
                Cancelar
            </button>
            <button @click="confirmar()" class="saturn-btn-primary">
                Confirmar
            </button>
        </div>
    </x-slot>
</x-ui.modal>
```

### Modal Grande

```blade
<x-ui.modal id="modal-grande" size="xl" title="Modal Grande">
    <p>Este modal tem tamanho extra grande</p>
</x-ui.modal>
```

### Modal Não Fechável

```blade
<x-ui.modal id="modal-fixo" :closable="false" title="Carregando...">
    <p>Este modal não pode ser fechado pelo usuário</p>
</x-ui.modal>
```

### Modal Auto-Open

```blade
{{-- Modal que abre automaticamente --}}
<x-ui.modal id="modal-auto" :autoOpen="true" title="Bem-vindo!">
    <p>Este modal abre automaticamente quando a página carrega</p>
</x-ui.modal>

{{-- Modal com delay de abertura --}}
<x-ui.modal id="modal-delay" :autoOpen="true" :delay="3000" title="Notificação">
    <p>Este modal abre automaticamente após 3 segundos</p>
</x-ui.modal>
```

## Auto-Abertura

O modal pode ser configurado para abrir automaticamente quando a página carrega:

### Abertura Imediata

```blade
<x-ui.modal id="welcome-modal" :autoOpen="true" title="Bem-vindo!">
    <p>Este modal abre imediatamente</p>
</x-ui.modal>
```

### Abertura com Delay

```blade
<x-ui.modal id="delayed-modal" :autoOpen="true" :delay="5000" title="Notificação">
    <p>Este modal abre após 5 segundos</p>
</x-ui.modal>
```

### Casos de Uso Comuns

- **Boas-vindas**: Modal de bienvenida para novos usuários
- **Notificações importantes**: Alertas que precisam ser vistos imediatamente
- **Promoções**: Ofertas especiais ou anúncios
- **Tutoriais**: Guias rápidos para novos recursos
- **Confirmações**: Status de ações executadas

## Métodos de Controle

### Via Alpine.js (Recomendado)

```html
<!-- Abrir modal -->
<button @click="$dispatch('open-{id}')">Abrir</button>

<!-- Fechar modal -->
<button @click="$dispatch('close-{id}')">Fechar</button>
```

### Via JavaScript

```javascript
// Abrir modal
openModal('meu-modal');

// Fechar modal
closeModal('meu-modal');

// Ou usando eventos personalizados
window.dispatchEvent(new CustomEvent('open-meu-modal'));
window.dispatchEvent(new CustomEvent('close-meu-modal'));
```

## Estilos Saturn UI Utilizados

O componente utiliza as seguintes classes do Saturn UI:

- `saturn-bg` - Fundo principal com suporte a dark mode
- `saturn-text` - Texto principal
- `saturn-text-accent` - Texto secundário
- `saturn-border` - Bordas
- `saturn-border-accent` - Bordas acentuadas
- `saturn-bg-accent` - Fundo acentuado
- `saturn-modal-bg` - Fundo do overlay com blur

## Acessibilidade

- Suporte a navegação por teclado (ESC para fechar)
- ARIA labels apropriados
- Foco adequado nos elementos interativos
- Contraste de cores otimizado

## Personalização

Você pode personalizar o modal através das props ou estendendo as classes CSS:

```blade
<x-ui.modal 
    id="modal-custom"
    size="2xl"
    title="Modal Personalizado"
    :overlay="false"
    class="custom-modal-class"
>
    <!-- Conteúdo personalizado -->
</x-ui.modal>
```

## Eventos

O modal emite os seguintes eventos:

- `open-{id}` - Abre o modal
- `close-{id}` - Fecha o modal

Você pode escutar estes eventos para executar ações customizadas:

```javascript
window.addEventListener('open-meu-modal', function() {
    console.log('Modal foi aberto');
});

window.addEventListener('close-meu-modal', function() {
    console.log('Modal foi fechado');
});
```

## Integração com Livewire

```blade
<div>
    <!-- Componente Livewire -->
    <button wire:click="abrirModal">Abrir Modal</button>
    
    <x-ui.modal id="modal-livewire" title="Modal Livewire">
        <div wire:loading>
            Carregando...
        </div>
        <div wire:loading.remove>
            {{ $conteudo }}
        </div>
    </x-ui.modal>
</div>

@script
<script>
    $wire.on('abrir-modal', () => {
        openModal('modal-livewire');
    });
</script>
@endscript
```

## Troubleshooting

### Modal não abre
- Verifique se o Alpine.js está carregado
- Confirme que o ID do modal está correto
- Verifique se há conflitos de CSS

### Estilo não aplicado
- Confirme que o Saturn UI está compilado
- Verifique se as classes estão sendo purgadas pelo Tailwind

### Performance
- Para múltiplos modais, considere lazy loading
- Use IDs únicos para evitar conflitos

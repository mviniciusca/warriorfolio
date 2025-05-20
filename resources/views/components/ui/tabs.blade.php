@props([
'tabs' => [],
'activeTab' => 'github-repositories'
])

@php
// Permite tabs como array de ['label' => ..., 'section' => ...] ou apenas string
$tabLabels = [];
foreach ($tabs as $id => $tab) {
$tabLabels[$id] = is_array($tab) ? ($tab['label'] ?? $id) : $tab;
}
@endphp

<div class="flex flex-col">
    <!-- Tabs Header -->
    <div class="mb-12 flex space-x-4 border-b border-secondary-200 dark:border-secondary-800">
        @foreach($tabLabels as $id => $label)
        <button type="button"
            class="tab-button text-xs px-4 py-2 {{ $id === $activeTab ? 'text-secondary-900 dark:text-secondary-100' : 'text-secondary-600 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100' }}"
            id="{{ $id }}-tab">
            {{ __($label) }}
        </button>
        @endforeach
    </div>

    <!-- Tabs Content -->
    <div class="tab-content">
        {{ $slot }}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabPanes = document.querySelectorAll('.tab-pane');

            function setActiveTab(tabName) {
                localStorage.setItem('activeTab', tabName);
                // Usar pushState em vez de mudar location.hash para evitar o scroll
                history.pushState(null, null, '#' + tabName);
            }

            function switchTab(tabName) {
                // First, reset all buttons
                tabButtons.forEach(button => {
                    button.classList.remove('active-tab', 'text-secondary-900', 'dark:text-secondary-100');
                    button.classList.add('text-secondary-500', 'dark:text-secondary-400');
                });

                // Then hide all panels
                tabPanes.forEach(pane => {
                    if (pane.id === tabName) {
                        pane.classList.remove('hidden');
                    } else {
                        pane.classList.add('hidden');
                    }
                });

                // Activate the selected button
                const selectedTab = document.getElementById(tabName + '-tab');
                if (selectedTab) {
                    selectedTab.classList.add('active-tab', 'text-secondary-900', 'dark:text-secondary-100');
                    selectedTab.classList.remove('text-secondary-500', 'dark:text-secondary-400');
                    setActiveTab(tabName);
                }
            }

            // Add click handlers
            tabButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevenir o comportamento padrão do navegador
                    const tabName = button.id.replace('-tab', '');
                    switchTab(tabName);
                });
            });

            // Handle back/forward buttons
            window.addEventListener('popstate', () => {
                const tabName = window.location.hash.replace('#', '') || 'github-repositories';
                switchTab(tabName);
            });

            // Initial load - check hash first, then localStorage, fallback to github-repositories
            const urlHash = window.location.hash.replace('#', '');
            const savedTab = localStorage.getItem('activeTab');
            const initialTab = urlHash || savedTab || 'github-repositories';
            switchTab(initialTab);

            // Se iniciar com uma hash, evitar que o navegador role até a âncora
            if (window.location.hash) {
                // Technique to prevent jumps
                setTimeout(() => {
                    window.scrollTo(0, 0);
                }, 1);
            }
        });
    </script>
</div>

<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saturn UI - Component Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full saturn-bg saturn-text">

    <!-- Navigation -->
    <nav class="saturn-nav">
        <div class="saturn-container">
            <div class="saturn-flex-between py-4">
                <h1 class="text-xl font-bold">Saturn UI Demo</h1>
                <div class="saturn-flex-center space-x-4">
                    <a href="#" class="saturn-nav-item saturn-nav-item-active">Home</a>
                    <a href="#" class="saturn-nav-item">Components</a>
                    <a href="#" class="saturn-nav-item">Documentation</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="saturn-section-spacious saturn-bg-accent">
        <div class="saturn-container-narrow text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 saturn-text">
                Saturn UI Components
            </h1>
            <p class="text-xl saturn-text-accent mb-8">
                Uma biblioteca de componentes moderna e responsiva para seus projetos
            </p>
            <div class="saturn-flex-center space-x-4">
                <button class="saturn-btn-primary saturn-btn-lg">Get Started</button>
                <button class="saturn-btn-secondary saturn-btn-lg">View on GitHub</button>
            </div>
        </div>
    </section>

    <!-- Components Showcase -->
    <section class="saturn-section">
        <div class="saturn-container">

            <!-- Cards Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold mb-8 text-center">Cards</h2>
                <div class="saturn-grid-3">
                    <div class="saturn-card">
                        <h3 class="text-xl font-semibold mb-2">Basic Card</h3>
                        <p class="saturn-text-accent">Esta é uma carta básica com texto e fundo padrão.</p>
                    </div>

                    <div class="saturn-card-elevated">
                        <h3 class="text-xl font-semibold mb-2">Elevated Card</h3>
                        <p class="saturn-text-accent">Carta elevada com sombra mais pronunciada.</p>
                    </div>

                    <div class="saturn-card-interactive saturn-hover-lift">
                        <h3 class="text-xl font-semibold mb-2">Interactive Card</h3>
                        <p class="saturn-text-accent">Carta interativa com efeitos de hover.</p>
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold mb-8 text-center">Buttons</h2>
                <div class="saturn-flex-center flex-wrap gap-4">
                    <button class="saturn-btn-primary">Primary</button>
                    <button class="saturn-btn-secondary">Secondary</button>
                    <button class="saturn-btn-ghost">Ghost</button>
                    <button class="saturn-btn-primary saturn-btn-sm">Small</button>
                    <button class="saturn-btn-primary saturn-btn-lg">Large</button>
                    <button class="saturn-btn-primary saturn-disabled">Disabled</button>
                </div>
            </div>

            <!-- Badges Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold mb-8 text-center">Badges</h2>
                <div class="saturn-flex-center flex-wrap gap-4">
                    <span class="saturn-badge-primary">Primary</span>
                    <span class="saturn-badge-success">Success</span>
                    <span class="saturn-badge-warning">Warning</span>
                    <span class="saturn-badge-error">Error</span>
                </div>
            </div>

            <!-- Form Elements -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold mb-8 text-center">Form Elements</h2>
                <div class="max-w-md mx-auto">
                    <div class="saturn-input-group">
                        <label class="saturn-label">Email</label>
                        <input type="email" class="saturn-input" placeholder="seu@email.com">
                    </div>

                    <div class="saturn-input-group">
                        <label class="saturn-label">Password</label>
                        <input type="password" class="saturn-input" placeholder="••••••••">
                    </div>

                    <button class="saturn-btn-primary w-full mt-4">Sign In</button>
                </div>
            </div>

            <!-- Tabs Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold mb-8 text-center">Tabs</h2>
                <div class="max-w-md mx-auto">
                    <div class="saturn-tab-list">
                        <button class="saturn-tab-active">Tab 1</button>
                        <button class="saturn-tab">Tab 2</button>
                        <button class="saturn-tab">Tab 3</button>
                    </div>
                    <div class="saturn-card mt-4">
                        <p>Conteúdo da tab ativa</p>
                    </div>
                </div>
            </div>

            <!-- Loading States -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold mb-8 text-center">Loading States</h2>
                <div class="saturn-flex-center space-x-8">
                    <div class="saturn-spinner w-8 h-8"></div>
                    <div class="saturn-skeleton h-4 w-32"></div>
                    <div class="saturn-loading saturn-card w-32 h-20"></div>
                </div>
            </div>

        </div>
    </section>

    <!-- Feature Grid -->
    <section class="saturn-section saturn-bg-accent">
        <div class="saturn-container">
            <h2 class="text-3xl font-bold mb-12 text-center">Features</h2>
            <div class="saturn-grid-3">
                <div class="text-center saturn-hover-scale saturn-transition">
                    <div class="w-16 h-16 saturn-bg rounded-full saturn-flex-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Responsive</h3>
                    <p class="saturn-text-accent">Todos os componentes são totalmente responsivos</p>
                </div>

                <div class="text-center saturn-hover-scale saturn-transition">
                    <div class="w-16 h-16 saturn-bg rounded-full saturn-flex-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Dark Mode</h3>
                    <p class="saturn-text-accent">Suporte nativo para tema claro e escuro</p>
                </div>

                <div class="text-center saturn-hover-scale saturn-transition">
                    <div class="w-16 h-16 saturn-bg rounded-full saturn-flex-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fillRule="evenodd"
                                d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                clipRule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Customizable</h3>
                    <p class="saturn-text-accent">Fácil de personalizar com Tailwind CSS</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="saturn-section-compact saturn-bg-inverse saturn-text-inverse">
        <div class="saturn-container">
            <div class="saturn-flex-between">
                <p>&copy; 2025 Saturn UI. All rights reserved.</p>
                <div class="saturn-flex-center space-x-4">
                    <a href="#" class="saturn-text-accent-inverse hover:saturn-text-inverse saturn-transition">Docs</a>
                    <a href="#"
                        class="saturn-text-accent-inverse hover:saturn-text-inverse saturn-transition">GitHub</a>
                    <a href="#"
                        class="saturn-text-accent-inverse hover:saturn-text-inverse saturn-transition">Twitter</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>

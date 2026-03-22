@php
    $githubProfileUrl = filled($githubUser ?? null) ? 'https://github.com/' . $githubUser : null;
    /** Gráfico para fundo claro: rampa a partir de `primary-600` (violet). */
    $githubChartUrlLight = filled($githubUser ?? null)
        ? 'https://ghchart.rshah.org/7c3aed/' . rawurlencode($githubUser)
        : null;
    $githubChartUrlBranded = $githubChartUrlLight;
    /** Gráfico para fundo escuro: paleta GitHub padrão + invert no cliente (par com tema escuro / faixa escura). */
    $githubChartUrlDark = filled($githubUser ?? null)
        ? 'https://ghchart.rshah.org/' . rawurlencode($githubUser)
        : null;
    $repoList = $repositories ?? [];
    $inv = (bool) ($is_section_filled_inverted ?? false);
    /** Mesmo trilho que `x-ui.card` + `feature-card`: trilho de superfície + borda invertida. */
    $panelClass = $inv
        ? 'border saturn-border-inverse saturn-bg-accent-inverse shadow-sm dark:shadow-none'
        : 'border saturn-border saturn-bg-accent shadow-sm dark:shadow-none';
    $dashedBorder = $inv ? 'saturn-border-inverse' : 'saturn-border';
    $langBadge = $inv
        ? 'rounded-md border saturn-border saturn-bg px-2 py-0.5 text-xs font-medium saturn-text'
        : 'rounded-md border border-primary-500/20 bg-primary-500/10 px-2 py-0.5 text-xs font-medium text-primary-700 dark:border-primary-400/25 dark:bg-primary-400/10 dark:text-primary-200';
    $linkAccent = $inv
        ? 'text-primary-300 hover:text-primary-200 hover:underline dark:text-primary-600 dark:hover:text-primary-500'
        : 'text-primary-600 hover:underline dark:text-primary-400';
@endphp

@if (($render_content ?? false))
    <x-core.layout :$is_filled :$with_padding :$module_name :$button_header :$button_url :$is_centered :$title
        :$subtitle :$is_section_filled_inverted :$is_section_top_border :$is_heading_visible :$button_icon :$module_slug>
        <section class="my-12" id="github-repositories-section">
            @if (!filled($githubUser))
                <div class="rounded-xl border border-dashed py-10 text-center {{ $dashedBorder }}">
                    <p class="text-sm opacity-60">
                        {{ __('Set your GitHub username in Settings → API Keys & Integrations.') }}</p>
                </div>
            @endif

            @if (filled($githubUser) && ($show_graphs ?? false))
                {{--
                    Quatro combinações (tema global `html.dark` ↔ secção invertida):
                    — Claro + normal, Escuro + invertido → fundo claro → imagem clara.
                    — Claro + invertido, Escuro + normal → fundo escuro → imagem escura (SVG padrão + invert).
                    Visibilidade: gráfico claro quando (dark XOR inv) é falso; escuro quando XOR é verdadeiro.
                --}}
                <div class="mb-8 overflow-hidden rounded-xl p-4 {{ $panelClass }}">
                    {{-- Wrappers: `hidden` no pai garante uma variante visível (evita empilhar se algo afetar <img>). --}}
                    <div class="{{ $inv ? 'hidden dark:block' : 'block dark:hidden' }}">
                        <img alt="{{ __('GitHub contribution graph') }}"
                            class="w-full [image-rendering:-webkit-optimize-contrast]" src="{{ $githubChartUrlLight }}"
                            loading="lazy" decoding="async">
                    </div>
                    <div class="{{ $inv ? 'block dark:hidden' : 'hidden dark:block' }}">
                        <img alt="{{ __('GitHub contribution graph') }}" class="w-full opacity-95 grayscale invert"
                            src="{{ $githubChartUrlDark }}" loading="lazy" decoding="async">
                    </div>
                </div>
            @endif

            @if (filled($githubUser) && $show_repositories_feed)
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse ($repoList as $repository)
                        <a class="group relative flex min-h-[10rem] flex-col justify-between overflow-hidden rounded-xl p-4 transition-all {{ $panelClass }} hover:border-primary-500/40 hover:shadow-md dark:hover:border-primary-400/30"
                            data-language="{{ $repository['language'] ?? '' }}" href="{{ $repository['html_url'] ?? '#' }}"
                            rel="noopener noreferrer" target="_blank">
                            <div
                                class="pointer-events-none absolute inset-0 bg-gradient-to-br from-primary-500/0 to-primary-600/0 opacity-0 transition-opacity duration-300 group-hover:from-primary-500/10 group-hover:to-primary-600/15 group-hover:opacity-100 dark:group-hover:from-primary-400/15 dark:group-hover:to-primary-500/10">
                            </div>
                            <div class="relative min-w-0">
                                <div class="flex items-center gap-2">
                                    <svg class="h-4 w-4 shrink-0 opacity-70" fill="currentColor"
                                        viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path
                                            d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z" />
                                    </svg>
                                    <h3 class="truncate text-sm font-semibold transition-colors duration-300 group-hover:text-primary-500 dark:group-hover:text-primary-400"
                                        title="{{ $repository['name'] ?? '—' }}">
                                        {{ $repository['name'] ?? '—' }}
                                    </h3>
                                </div>
                                <p class="mt-3 line-clamp-3 text-xs leading-relaxed opacity-60 transition-opacity duration-300 group-hover:opacity-80"
                                    title="{{ $repository['description'] ?? '' }}">
                                    {{ $repository['description'] ?? __('No description available.') }}
                                </p>
                            </div>
                            <div class="relative mt-3 flex flex-wrap items-center justify-between gap-2">
                                <div class="flex items-center gap-3 text-xs opacity-60">
                                    <span class="inline-flex items-center gap-1" title="{{ __('Stars') }}">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                        </svg>
                                        {{ $repository['stargazers_count'] ?? 0 }}
                                    </span>
                                    <span class="inline-flex items-center gap-1" title="{{ __('Forks') }}">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <line x1="6" x2="6" y1="3" y2="15" />
                                            <circle cx="18" cy="6" r="3" />
                                            <circle cx="6" cy="18" r="3" />
                                            <path d="M18 9a9 9 0 0 1-9 9" />
                                        </svg>
                                        {{ $repository['forks_count'] ?? 0 }}
                                    </span>
                                </div>
                                @if (!empty($repository['language']))
                                    <span class="{{ $langBadge }}">
                                        {{ $repository['language'] }}
                                    </span>
                                @endif
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full rounded-xl border border-dashed py-12 text-center {{ $dashedBorder }}">
                            <p class="text-sm opacity-60">{{ __('No repositories found.') }}</p>
                            @if (filled($githubProfileUrl))
                                <a class="mt-3 inline-flex text-sm font-medium {{ $linkAccent }}"
                                    href="{{ $githubProfileUrl }}" rel="noopener noreferrer" target="_blank">
                                    {{ __('View profile on GitHub') }}
                                </a>
                            @endif
                        </div>
                    @endforelse
                </div>
            @endif
        </section>
    </x-core.layout>
@endif

@props([
    'id' => null,
    'style' => null,
    'button_text' => null,
    'is_dismissible' => false,
])

@php
    /** Sem `.saturn-alert` global (evita `text-xs`/`z-50` a herdar em botões e barreiras). */
    $shell = 'animate__animated animate__delay-1s z-[60] w-full antialiased';
    $surface = 'saturn-bg saturn-text border saturn-border-accent shadow-sm';
@endphp

{{-- Inline (sem estilo Filament) --}}
@if ($style === null)
    <div @if ($id) id="wrapper-{{ $id }}" @endif tabindex="-1"
        {{ $attributes->merge([
            'class' => $shell . ' border-x-0 border-t-0 ' . $surface,
        ]) }}>
        <x-ui.partials.alert.inner-row :$button_text :$is_dismissible>
            {!! $slot !!}
        </x-ui.partials.alert.inner-row>
    </div>
@endif

{{-- Default: fixo em baixo --}}
@if ($style === 'default')
    <div wire:key="alert-{{ $id }}" id="wrapper-{{ $id }}" tabindex="-1" wire:ignore
        {{ $attributes->merge([
            'class' =>
                $shell .
                ' fixed bottom-0 left-0 right-0 border-x-0 border-b-0 ' .
                $surface .
                ' animate__fadeInUp',
        ]) }}>
        <x-ui.partials.alert.inner-row :$button_text :$is_dismissible>
            {!! $slot !!}
        </x-ui.partials.alert.inner-row>
    </div>
@endif

{{-- Bumper: fixo no topo --}}
@if ($style === 'bumper')
    <div wire:key="alert-{{ $id }}" id="wrapper-{{ $id }}" tabindex="-1"
        {{ $attributes->merge([
            'class' =>
                $shell .
                ' fixed left-0 right-0 top-0 border-x-0 border-t-0 ' .
                $surface .
                ' animate__fadeInDown',
        ]) }}>
        <x-ui.partials.alert.inner-row :$button_text :$is_dismissible>
            {!! $slot !!}
        </x-ui.partials.alert.inner-row>
    </div>
@endif

{{-- Banner: fluxo normal no topo --}}
@if ($style === 'banner')
    <div wire:key="alert-{{ $id }}" id="wrapper-{{ $id }}" tabindex="-1"
        {{ $attributes->merge([
            'class' => $shell . ' border-x-0 border-t-0 ' . $surface,
        ]) }}>
        <x-ui.partials.alert.inner-row :$button_text :$is_dismissible>
            {!! $slot !!}
        </x-ui.partials.alert.inner-row>
    </div>
@endif

{{-- Toast --}}
@if ($style === 'toast')
    <div wire:key="alert-{{ $id }}" id="wrapper-{{ $id }}" tabindex="-1"
        {{ $attributes->merge([
            'class' =>
                $shell .
                ' fixed bottom-5 left-4 right-4 mx-auto max-w-xl rounded-xl ' .
                $surface .
                ' animate__fadeInUp sm:left-5 sm:right-auto',
        ]) }}>
        <x-ui.partials.alert.inner-row :$button_text :$is_dismissible>
            {!! $slot !!}
        </x-ui.partials.alert.inner-row>
    </div>
@endif

{{-- Modal --}}
@if ($style === 'modal')
    <x-ui.modal tabindex="-1" wire:key="alert-{{ $id }}" id="wrapper-{{ $id }}" :autoOpen="true" :title="null"
        :closable="true" :overlay="true" size="md">
        <x-ui.partials.alert.inner-row :embedded="true" :show_actions="false">
            {!! $slot !!}
        </x-ui.partials.alert.inner-row>
        <x-slot name="footer">
            <div class="flex w-full flex-wrap items-center justify-end gap-2">
                <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
            </div>
        </x-slot>
    </x-ui.modal>
@endif

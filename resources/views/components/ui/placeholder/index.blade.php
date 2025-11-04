{{--
Minimalist Placeholder Components

A collection of clean, minimalist loading placeholders for various UI elements.
All components support animation and customization.

Usage Examples:

Text Placeholder:
<x-ui.placeholder.text :lines="3" />
<x-ui.placeholder.text :lines="1" width="w-1/2" :animated="false" />

Image Placeholder:
<x-ui.placeholder.image />
<x-ui.placeholder.image class="aspect-square" />
<x-ui.placeholder.image height="h-32" rounded="rounded-xl" />

Avatar Placeholder:
<x-ui.placeholder.avatar />
<x-ui.placeholder.avatar size="w-16 h-16" />

Card Placeholder:
<x-ui.placeholder.card />
<x-ui.placeholder.card :show-image="false" />
<x-ui.placeholder.card :show-meta="false" />

Button Placeholder:
<x-ui.placeholder.button />
<x-ui.placeholder.button width="w-32" height="h-12" />

List Placeholder:
<x-ui.placeholder.list :items="5" />
<x-ui.placeholder.list :items="3" :show-avatar="false" />

Grid Placeholder:
<x-ui.placeholder.grid :cols="4" :rows="2" />
<x-ui.placeholder.grid :cols="2" :rows="3" spacing="gap-6" />

Featured Placeholder:
<x-ui.placeholder.featured />
<x-ui.placeholder.featured :show-image="false" />

Form Placeholder:
<x-ui.placeholder.form :fields="6" />
<x-ui.placeholder.form :fields="3" :show-labels="false" />
--}}

@props(['demo' => false])

@if($demo)
<div class="space-y-12 p-8">
    <div>
        <h2 class="text-2xl font-bold mb-4">Text Placeholders</h2>
        <div class="space-y-4">
            <x-ui.placeholder.text :lines="3" />
            <x-ui.placeholder.text :lines="1" width="w-1/2" />
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4">Image Placeholders</h2>
        <div class="grid grid-cols-2 gap-4">
            <x-ui.placeholder.image />
            <x-ui.placeholder.image class="aspect-square" />
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4">Avatar Placeholders</h2>
        <div class="flex items-center gap-4">
            <x-ui.placeholder.avatar size="w-8 h-8" />
            <x-ui.placeholder.avatar size="w-12 h-12" />
            <x-ui.placeholder.avatar size="w-16 h-16" />
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4">Card Placeholder</h2>
        <div class="max-w-md">
            <x-ui.placeholder.card />
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4">Featured Placeholder</h2>
        <div class="max-w-2xl">
            <x-ui.placeholder.featured />
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4">List Placeholder</h2>
        <x-ui.placeholder.list :items="3" />
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4">Grid Placeholder</h2>
        <x-ui.placeholder.grid :cols="3" :rows="2" />
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4">Form Placeholder</h2>
        <div class="max-w-md">
            <x-ui.placeholder.form :fields="4" />
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold mb-4">Button Placeholders</h2>
        <div class="flex items-center gap-4">
            <x-ui.placeholder.button />
            <x-ui.placeholder.button width="w-32" height="h-12" />
            <x-ui.placeholder.button width="w-20" height="h-8" />
        </div>
    </div>
</div>
@endif

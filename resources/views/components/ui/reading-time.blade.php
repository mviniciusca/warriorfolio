@props([
'content' => '',
'showWordCount' => false,
'size' => 'sm', // sm, md, lg
'style' => 'default' // default, badge, minimal
])

@php
try {
if (empty($content)) {
return;
}

// Simple calculation without external helper initially
$plainText = html_entity_decode(strip_tags($content));
$words = array_filter(explode(' ', $plainText));
$wordCount = count($words);
$minutes = max(1, ceil($wordCount / 200)); // 200 words per minute

$readingText = $minutes === 1 ? '1 min read' : "{$minutes} min read";

if ($showWordCount) {
$readingText = number_format($wordCount) . " words • " . $readingText;
}

$sizeClasses = [
'sm' => 'text-xs',
'md' => 'text-sm',
'lg' => 'text-base'
];

$styleClasses = [
'default' => 'saturn-flex-start gap-1.5 saturn-text',
'badge' => 'saturn-badge saturn-bg-accent border saturn-border-accent saturn-text',
'minimal' => 'saturn-text'
];

$currentSize = $sizeClasses[$size] ?? $sizeClasses['sm'];
$currentStyle = $styleClasses[$style] ?? $styleClasses['default'];
} catch (Exception $e) {
// Fallback if there's any error
$readingText = '';
$currentSize = 'text-xs';
$currentStyle = 'saturn-text';
}
@endphp

@if(!empty($readingText))
<div class="{{ $currentStyle }} {{ $currentSize }}">
    @if($style !== 'minimal')
    <x-ui.ionicon icon="time-outline" class="w-3 h-3" />
    @endif
    <span>{{ $readingText }}</span>
</div>
@endif

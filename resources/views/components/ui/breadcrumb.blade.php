@props([
'items' => [],
'showBackButton' => true,
'backUrl' => null,
'backText' => 'Back'
])

<nav class="saturn-breadcrumb-wrapper" aria-label="Breadcrumb">
    @if($showBackButton && $backUrl)
    <!-- Back Button Style -->
    <div class="saturn-breadcrumb-back">
        <a href="{{ $backUrl }}" class="saturn-breadcrumb-back group">
            <x-ui.ionicon icon="arrow-back-sharp" class="w-4 h-4 group-hover:-translate-x-0.5 saturn-transition" />
            <span>{{ __($backText) }}</span>
        </a>
    </div>
    @else
    <!-- Traditional Breadcrumb Style -->
    <ol class="saturn-breadcrumb">
        @foreach($items as $index => $item)
        <li class="saturn-breadcrumb-item">
            @if($loop->last)
            <span class="saturn-breadcrumb-current" aria-current="page">
                {{ $item['title'] }}
            </span>
            @else
            <a href="{{ $item['url'] }}" class="saturn-breadcrumb-link">
                {{ $item['title'] }}
            </a>
            @endif
        </li>
        @endforeach
    </ol>
    @endif
</nav>

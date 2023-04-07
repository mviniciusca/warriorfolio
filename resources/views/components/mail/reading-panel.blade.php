@props(['show'])
<div>
    <div class="p-8">
        @if ($show !== null)
            {{ $show->body }}
        @endif
    </div>
</div>

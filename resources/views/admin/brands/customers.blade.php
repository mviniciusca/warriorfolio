<div>
    @if($getRecord()->name)
    <p class="absolute rounded-md bg-primary-600 px-3 py-1 text-xs text-white">
        {{ $getRecord()->name }}
    </p>
    @endif
    <x-curator-glider class="mx-auto h-24 w-24 object-contain" :media="$getRecord()->logo" />
</div>

@props(['item' => null])
@foreach ($data as $item)
    @if ($item->is_active)
        <x-blog.post.card :$item />
    @endif
@endforeach
<div class="py-8">
    {{ $data->links() }}
</div>

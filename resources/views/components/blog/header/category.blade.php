<div class="my-8 border-b border-b-secondary-200 pb-4 dark:border-b-secondary-800">
    @foreach ($data as $category)
        <span class="mr-4 w-full text-sm">{{ $category->name }}</span>
    @endforeach
</div>

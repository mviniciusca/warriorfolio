<div>
    <h1 class="my-4 text-base font-bold">Stats</h1>
    @foreach ($data as $item)
        <div
            class="flex justify-between border-b border-b-secondary-100 py-2 pb-3 font-mono text-sm uppercase dark:border-b-slate-800">
            <p>{{ $item['label'] }}</p>
            <p class="rounded-lg bg-primary-800 px-3 text-center text-white shadow-inner">{{ $item['count'] }}
            </p>
        </div>
    @endforeach
</div>

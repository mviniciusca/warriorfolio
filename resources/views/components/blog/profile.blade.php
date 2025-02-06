@props([
    'published_at' => null,
])
<div>
    <address class="flex items-center mb-6 not-italic">
        <div class="inline-flex items-center mr-3 text-sm ">
            <img class="mr-4 w-16 h-16 rounded-full" src="{{$user->profile->avatar ? asset('storage/' . $user->profile->avatar) : asset('img/core/profile-picture.png')}}" alt="Jese Leos">
            <div>
                <p href="#" rel="author" class="text-xl font-bold ">{{ $user->name }}</p>
                <p class="text-base">{{ $user->profile->job_position }} • {{ $user->profile->localization }}</p>
                <p class="text-base"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ $published_at }}</time></p>
            </div>
        </div>
    </address>
</div>

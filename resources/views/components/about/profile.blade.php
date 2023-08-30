@props(['profile', 'skills'])

<div class="grid grid-rows-1 justify-center gap-4 text-center">

				{{-- Profile Picture --}}
				<div class="mx-auto mb-4 flex h-44 w-44 items-center justify-center rounded-full bg-zinc-900">
								{{-- Profile Picture from Database --}}
								@if ($profile->picture !== null)
												<img src="{{ asset('storage/' . $profile->picture) }}" class="mx-auto my-auto rounded-full" />
												{{-- Default Profile Picture --}}
								@else
												<img src="{{ asset('/img/logo-white.png') }}" alt="Profile Picture" class="mx-auto my-auto p-10">
								@endif
				</div>
				{{-- End Profile Picture --}}
				{{-- Profile Title --}}
				<div class="grid items-center justify-center gap-2">
								<p class="text-md">{{ $profile->name }}</p>
								<p class="text-sm">{{ $profile->localization }}</p>
								<p class="pb-3 text-xs">{{ $profile->job_position }}</p>
								{{-- Skills --}}
								<div>
												@foreach ($skills as $skill)
																<!-- Iterates over each item in the skill array -->
																@foreach ($skill as $item)
																				<!-- Renders the skill component for each item -->
																				<x-ui.skill :skill="$item" />
																@endforeach
												@endforeach
								</div>
								{{-- End Skills --}}
								{{-- Social Network --}}
								<div class="mt-2 justify-center gap-3">
												<x-ui.social-network :profile='$profile' />
								</div>
								{{-- End Social Network --}}
				</div>
				{{-- End Profile Title --}}

</div>

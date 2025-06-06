<div>
    <!-- Categories Slider -->
    <div class="relative my-12 border-b saturn-border">
        <!-- Navigation Buttons -->
        <button
            class="categories-prev absolute left-0 top-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-white/90 backdrop-blur-sm border rounded-full flex items-center justify-center shadow-sm hover:bg-gray-100 transition-colors dark:bg-gray-800/90 dark:border-gray-600 dark:hover:bg-gray-700">
            <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <button
            class="categories-next absolute right-0 top-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-white/90 backdrop-blur-sm border rounded-full flex items-center justify-center shadow-sm hover:bg-gray-100 transition-colors dark:bg-gray-800/90 dark:border-gray-600 dark:hover:bg-gray-700">
            <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Swiper Container -->
        <div class="swiper categories-swiper mx-8">
            <div class="swiper-wrapper">
                @if ($categories->count() >= 2)
                <div class="swiper-slide !w-auto">
                    <p class="flex items-center gap-2 cursor-pointer border-b-2 border-b-transparent pb-3 text-sm font-medium transition-all duration-150 hover:border-b-secondary-900 active:opacity-10 dark:hover:border-b-secondary-200 whitespace-nowrap"
                        wire:click="setCategory(null)">
                        <x-ui.ionicon icon="pricetag-outline" class="inline-block w-4 h-4" />
                        {{ __('All') }}
                    </p>
                </div>
                @endif

                @foreach ($categories as $category)
                <div class="swiper-slide !w-auto">
                    <p class="cursor-pointer flex items-center gap-2 border-b-2 border-b-transparent pb-3 text-sm transition-all duration-150 hover:saturn-border-inverse active:opacity-30 whitespace-nowrap"
                        wire:click="setCategory({{ $category->id }})">
                        <x-ui.ionicon icon="{{ $category->icon ?? 'pricetag-outline' }}" class="inline-block w-4 h-4" />
                        {{ ucfirst($category->name) }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @if ($activePostsCount != 0)
    @foreach ($data as $item)
    @if ($item->post->is_active)
    <x-blog.post.card :$item />
    @endif
    @endforeach
    @else
    <x-ui.empty-section :message="'No posts yet.'" :auth="'Create a new Note in your Dashboard.'" />
    @endif

    <div class="py-8">
        {{ $data->links() }}
    </div>

    <style>
        /* Swiper customizations */
        .categories-swiper {
            overflow: hidden;
            width: 100%;
        }

        .categories-swiper .swiper-wrapper {
            display: flex;
            align-items: center;
        }

        .categories-swiper .swiper-slide {
            width: auto !important;
            flex-shrink: 0;
        }

        /* Navigation buttons */
        .categories-prev,
        .categories-next {
            z-index: 10;
        }

        /* Hide scrollbar */
        .categories-swiper::-webkit-scrollbar {
            display: none;
        }

        .categories-swiper {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Wait a bit to ensure DOM is fully loaded
            setTimeout(function() {
                console.log('Initializing Categories Swiper...');

                // Check if Swiper is available
                if (typeof Swiper === 'undefined') {
                    console.error('Swiper is not loaded!');
                    return;
                }

                // Initialize Categories Swiper
                const categoriesSwiper = new Swiper('.categories-swiper', {
                    slidesPerView: 'auto',
                    spaceBetween: 8,
                    freeMode: true,
                    navigation: {
                        nextEl: '.categories-next',
                        prevEl: '.categories-prev',
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 'auto',
                            spaceBetween: 8,
                        },
                        640: {
                            slidesPerView: 'auto',
                            spaceBetween: 12,
                        },
                        1024: {
                            slidesPerView: 'auto',
                            spaceBetween: 16,
                        },
                    }
                });

                console.log('Categories Swiper initialized successfully!', categoriesSwiper);
            }, 300);
        });
    </script>
</div>

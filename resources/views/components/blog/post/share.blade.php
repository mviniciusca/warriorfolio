@aware(['page'])

@if ($data['is_share_active'] ?? false)
    <div class="flex flex-initial items-center gap-1 py-4">
        <p class="mr-4 font-mono text-xs uppercase">{{ __('Share') }}</p>
        <!-- Facebook -->
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&quote={{ urlencode($page->title) }}"
            target="_blank">
            <x-ui.icon :name="'facebook'" />
        </a>

        <!-- Twitter -->
        <a href="https://twitter.com/intent/tweet?text={{ urlencode($page->title) }}&url={{ urlencode(url()->current()) }}"
            target="_blank">
            <x-ui.icon :name="'twitter'" />
        </a>

        <!-- WhatsApp -->
        <a href="https://wa.me/?text={{ urlencode($page->title . ' - ' . url()->current()) }}" target="_blank">
            <x-ui.icon :name="'whatsapp'" />
        </a>

        <!-- Linkedin -->
        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($page->title) }}"
            target="_blank">
            <x-ui.icon :name="'linkedin'" />
        </a>


        <!-- Pinterest -->
        <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&description={{ urlencode($page->title) }}"
            target="_blank">
            <x-ui.icon :name="'pinterest'" />
        </a>


        <!-- Reddit -->
        <a href="https://www.reddit.com/submit?url={{ urlencode(url()->current()) }}&title={{ urlencode($page->title) }}"
            target="_blank">
            <x-ui.icon :name="'reddit'" />
        </a>


    </div>
@endif

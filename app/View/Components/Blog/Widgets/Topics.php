<?php

namespace App\View\Components\Blog\Widgets;

use App\Models\Setting;
use App\View\Components\Blog\Widget\Counter;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Legacy tag <x-blog.widgets.topics /> — mesmo bloco que <x-blog.widget.counter />.
 */
class Topics extends Component
{
    public function render(): View
    {
        $blog = Setting::first('blog');

        return view('components.blog.widget.counter', [
            'data' => (new Counter)->getData(),
            'blog_data' => $blog?->blog ?? [],
        ]);
    }
}

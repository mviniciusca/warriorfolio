<?php

namespace App\View\Components\Ui;

use Closure;
use App\Models\Chatbox as Cb;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Chatbox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.chatbox', [
            'chatbox' => Cb::first()
        ]);
    }
}

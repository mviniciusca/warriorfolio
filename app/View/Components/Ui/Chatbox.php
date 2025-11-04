<?php

namespace App\View\Components\Ui;

use App\Models\Chatbox as ChatboxModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Chatbox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?bool $is_active = false,
        public ?int $mobile_number = null,
        public ?string $message = null,
        public ?string $animation_style = null,
        public ?string $color = null ?? '#25D366',
        public ?string $icon = null ?? 'logo-whatsapp',
    ) {
        $data = ChatboxModel::sole();

        $this->is_active = $data->visible ?? false;
        $this->mobile_number = $data->telephone ?? null;
        $this->message = $data->message ?? null;
        $this->animation_style = $data->animation_style ?? null;
        $this->color = $data->color ?? null;
        $this->icon = $data->icon ?? 'logo-whatsapp';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.chatbox', [
            //
        ]);
    }
}

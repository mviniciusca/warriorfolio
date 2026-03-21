<?php

namespace App\Livewire;

use App\Models\Newsletter as ModelNewsletter;
use Exception;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Newsletter extends Component
{
    public string $email = '';

    public $buttonText = 'Subscribe';

    public $is_section_filled_inverted = false;

    public $buttonIcon = 'mail-outline';

    public function mount($buttonText = null, $buttonIcon = null, $is_section_filled_inverted = null): void
    {
        if ($buttonText !== null) {
            $this->buttonText = $buttonText;
        }

        if ($buttonIcon !== null) {
            $this->buttonIcon = $buttonIcon;
        }

        if ($is_section_filled_inverted !== null) {
            $this->is_section_filled_inverted = $is_section_filled_inverted;
        }
    }

    /**
     * Subscribe to the newsletter.
     *
     * @return void
     */
    public function create(): void
    {
        $data = $this->validate([
            'email' => [
                'required',
                'string',
                'email',
                'min:5',
                'max:255',
                Rule::unique('newsletters', 'email'),
            ],
        ]);

        try {
            ModelNewsletter::create($data);

            Notification::make()
                ->title(__('Thanks for subscribing!'))
                ->success()
                ->send();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Notification::make()
                ->title(__('Error! Please, try again later.'))
                ->error()
                ->send();
        }

        $this->reset('email');
    }

    public function render(): View
    {
        return view('livewire.newsletter', [
            'buttonIcon' => $this->buttonIcon,
            'is_section_filled_inverted' => $this->is_section_filled_inverted,
        ]);
    }
}

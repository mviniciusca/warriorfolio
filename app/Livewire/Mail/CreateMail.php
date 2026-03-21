<?php

namespace App\Livewire\Mail;

use App\Models\Mail;
use App\Models\User;
use App\Notifications\NewMailNotification;
use App\Traits\WithRecaptcha;
use Exception;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateMail extends Component
{
    use WithRecaptcha;

    public array $data = [];

    public $is_section_filled_inverted = '';

    public function mount($is_section_filled_inverted = null): void
    {
        if ($is_section_filled_inverted !== null) {
            $this->is_section_filled_inverted = $is_section_filled_inverted;
        }
        $this->resetData();
        $this->initializeWithRecaptcha();
    }

    public function create(): void
    {
        if (! $this->verifyRecaptcha()) {
            return;
        }

        $data = $this->validate([
            'data.name' => ['required', 'string', 'min:5', 'max:50'],
            'data.email' => ['required', 'email', 'min:8', 'max:140'],
            'data.phone' => ['required', 'string', 'max:20', 'regex:/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'],
            'data.subject' => ['required', 'string', 'min:5', 'max:140'],
            'data.body' => ['required', 'string', 'min:20', 'max:1200'],
        ])['data'];

        try {
            Mail::create($data);
            Notification::make()
                ->title(__('Message sent!'))
                ->success()
                ->send();

            $this->resetData();
            $this->reset('recaptchaToken');
            $this->dispatch('formSubmitted');
        } catch (Exception $e) {
            Notification::make()
                ->title(__('Error on sent message!'))
                ->danger()
                ->send();
            Log::error($e->getMessage());
        }

        if (env('SMTP_SERVICES')) {
            try {
                $user = User::first(['email']);
                $user->notify(new NewMailNotification($data));
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
        }
    }

    public function render(): View
    {
        return view('livewire.mail.create-mail');
    }

    private function resetData(): void
    {
        $this->data = [
            'name' => '',
            'email' => '',
            'phone' => '',
            'subject' => '',
            'body' => '',
        ];
    }
}

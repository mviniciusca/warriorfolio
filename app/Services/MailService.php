<?php

namespace App\Services;

use App\Mail\MailMessage;
use Exception;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailService
{
    private string $fromEmail;

    private bool $error = false;

    public function __construct(public array $data)
    {
        $this->fromEmail = env('MAIL_FROM_ADDRESS', config('mail.from.address')) ?? Auth::user()?->email;
    }

    /**
     * Summary of prepare
     * @return MailService
     */
    private function prepare(): static
    {
        try {
            Mail::to($this->data['email'])
                ->send(new MailMessage($this->data));
        } catch (Exception $e) {
            $this->error = true;
            Log::error(__('Error on sending mail: ').$e->getMessage());
        }

        return $this;
    }

    /**
     * Summary of validate
     * @param mixed $message
     * @return MailService
     */
    private function validate(?string $message = null): static
    {
        if ($this->error) {
            Notification::make()
                ->danger()
                ->duration(10000)
                ->title(__($message ?? __('Message was not sent. Try again!')))
                ->send();
        } else {
            Notification::make()
                ->success()
                ->title(__($message ?? __('Message was sent with success!')))
                ->send();
        }

        return $this;
    }

    /**
     * Summary of save
     * @return MailService
     */
    private function save(): static
    {
        $this->prepare()->validate();

        return $this;
    }

    /**
     * Summary of send
     * @return MailService
     */
    public function send(): self
    {
        return $this->save();
    }
}

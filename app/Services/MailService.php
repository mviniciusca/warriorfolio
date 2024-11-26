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
        $this->fromEmail = env('MAIL_FROM_ADDRESS') ?? Auth::user()->email;
    }

    private function prepare()
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

    private function validate(?string $message = null)
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

    private function save()
    {
        $this->prepare()->validate();

        return $this;
    }

    public function send()
    {
        return $this->save();
    }
}

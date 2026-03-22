<?php

namespace App\Services;

use App\Mail\MailMessage;
use App\Models\Mail;
use Exception;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail as MailFacade;

class MailService
{
    private string $fromEmail;

    private bool $error = false;

    /**
     * @param  array<string, mixed>  $data
     * @param  Mail|null  $record  When set (admin “sent” row), updates {@see Mail::$smtp_delivered} after SMTP attempt.
     */
    public function __construct(
        public array $data,
        protected ?Mail $record = null,
    ) {
        $this->fromEmail = env('MAIL_FROM_ADDRESS', config('mail.from.address')) ?? Auth::user()?->email;
    }

    /**
     * @return $this
     */
    private function prepare(): static
    {
        try {
            MailFacade::to($this->data['email'])
                ->send(new MailMessage($this->data));
        } catch (Exception $e) {
            $this->error = true;
            Log::error(__('Error on sending mail: ').$e->getMessage());
        }

        return $this;
    }

    /**
     * @return $this
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

    private function persistSmtpDeliveredFlag(): void
    {
        if ($this->record === null || ! $this->record->is_sent) {
            return;
        }

        $this->record->forceFill([
            'smtp_delivered' => ! $this->error,
        ])->save();
    }

    /**
     * @return $this
     */
    private function save(): static
    {
        $this->prepare();
        $this->persistSmtpDeliveredFlag();
        $this->validate();

        return $this;
    }

    public function send(): self
    {
        return $this->save();
    }
}

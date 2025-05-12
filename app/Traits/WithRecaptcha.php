<?php

namespace App\Traits;

use App\Services\RecaptchaService;
use Filament\Notifications\Notification;

trait WithRecaptcha
{
    public string $recaptchaToken = '';

    public function initializeWithRecaptcha(): void
    {
        $this->listeners = array_merge($this->listeners ?? [], [
            'recaptcha-success' => 'setRecaptchaToken',
        ]);
    }

    public function setRecaptchaToken($token): void
    {
        $this->recaptchaToken = is_array($token) ? $token['token'] : $token;
    }

    protected function verifyRecaptcha(): bool
    {
        $recaptchaService = app(RecaptchaService::class);

        if (! $recaptchaService->isEnabled()) {
            return true;
        }

        if (! $recaptchaService->verify($this->recaptchaToken)) {
            Notification::make()
                ->title(__('Please complete the reCAPTCHA challenge'))
                ->danger()
                ->send();

            return false;
        }

        return true;
    }
}

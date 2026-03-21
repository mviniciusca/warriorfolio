<?php

namespace App\Traits;

use App\Contracts\CaptchaVerifier;
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
        $captchaVerifier = app(CaptchaVerifier::class);

        if (! $captchaVerifier->isEnabled()) {
            return true;
        }

        if (! $captchaVerifier->verifyToken($this->recaptchaToken, request()->ip())) {
            Notification::make()
                ->title(__('Please complete the reCAPTCHA challenge'))
                ->danger()
                ->send();

            return false;
        }

        return true;
    }
}

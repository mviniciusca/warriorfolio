<?php

namespace App\Services;

use ReCaptcha\ReCaptcha;

class RecaptchaService
{
    private ?ReCaptcha $recaptcha = null;

    private $settings;

    public function __construct()
    {
        $this->settings = app(\App\Models\Setting::class)->first();

        if ($this->isEnabled() && ! empty($this->settings->config['recaptcha_secret_key'])) {
            $this->recaptcha = new ReCaptcha($this->settings->config['recaptcha_secret_key']);
        }
    }

    public function verify(?string $token): bool
    {
        if (! $this->isEnabled()) {
            return true; // Se o reCAPTCHA está desativado, considera válido
        }

        if (empty($token) || ! $this->recaptcha) {
            return false;
        }

        $response = $this->recaptcha->verify($token);

        return $response->isSuccess();
    }

    public function getSiteKey(): string
    {
        return $this->settings->config['recaptcha_site_key'] ?? '';
    }

    public function isEnabled(): bool
    {
        return ! empty($this->settings->config['recaptcha_is_active']) &&
               ! empty($this->settings->config['recaptcha_site_key']) &&
               ! empty($this->settings->config['recaptcha_secret_key']);
    }
}

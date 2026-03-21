<?php

namespace App\Services\Captcha;

use App\Contracts\CaptchaVerifier;
use App\Models\Setting;
use ReCaptcha\ReCaptcha;

class GoogleRecaptchaVerifier implements CaptchaVerifier
{
    private ?array $config;

    private ?ReCaptcha $recaptcha;

    public function __construct()
    {
        $this->config = Setting::query()->first()?->config ?? [];

        $secret = $this->getSecretKey();
        $this->recaptcha = $secret ? new ReCaptcha($secret) : null;
    }

    public function isEnabled(): bool
    {
        return (bool) ($this->config['recaptcha_is_active'] ?? false)
            && filled($this->getSiteKey())
            && filled($this->getSecretKey());
    }

    public function getSiteKey(): string
    {
        return (string) ($this->config['recaptcha_site_key'] ?? config('recaptcha.site_key', ''));
    }

    public function verifyToken(?string $token, ?string $ip = null): bool
    {
        if (! $this->isEnabled()) {
            return true;
        }

        if (blank($token) || ! $this->recaptcha) {
            return false;
        }

        $response = $this->recaptcha->verify($token, $ip);

        return $response->isSuccess();
    }

    private function getSecretKey(): string
    {
        return (string) ($this->config['recaptcha_secret_key'] ?? config('recaptcha.secret_key', ''));
    }
}

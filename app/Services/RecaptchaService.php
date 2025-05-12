<?php

namespace App\Services;

use ReCaptcha\ReCaptcha;

class RecaptchaService
{
    private ReCaptcha $recaptcha;

    public function __construct()
    {
        $this->recaptcha = new ReCaptcha(config('recaptcha.secret_key'));
    }

    public function verify(?string $token): bool
    {
        if (empty($token)) {
            return false;
        }

        $response = $this->recaptcha->verify($token);

        return $response->isSuccess();
    }

    public function getSiteKey(): string
    {
        return config('recaptcha.site_key');
    }
}

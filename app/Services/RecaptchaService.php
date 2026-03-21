<?php

namespace App\Services;

use App\Contracts\CaptchaVerifier;

class RecaptchaService
{
    public function __construct(private readonly CaptchaVerifier $captchaVerifier) {}

    /**
     * @deprecated Use App\Contracts\CaptchaVerifier directly.
     */
    public function verify(?string $token): bool
    {
        return $this->captchaVerifier->verifyToken($token, request()->ip());
    }

    public function getSiteKey(): string
    {
        return $this->captchaVerifier->getSiteKey();
    }

    public function isEnabled(): bool
    {
        return $this->captchaVerifier->isEnabled();
    }
}

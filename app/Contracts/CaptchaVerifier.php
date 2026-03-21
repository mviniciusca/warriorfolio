<?php

namespace App\Contracts;

interface CaptchaVerifier
{
    public function isEnabled(): bool;

    public function getSiteKey(): string;

    public function verifyToken(?string $token, ?string $ip = null): bool;
}

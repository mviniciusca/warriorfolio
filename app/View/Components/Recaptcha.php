<?php

namespace App\View\Components;

use App\Contracts\CaptchaVerifier;
use Illuminate\View\Component;

class Recaptcha extends Component
{
    public string $siteKey;

    public bool $enabled;

    public function __construct(CaptchaVerifier $captchaVerifier)
    {
        $this->siteKey = $captchaVerifier->getSiteKey();
        $this->enabled = $captchaVerifier->isEnabled();
    }

    public function render()
    {
        return view('components.recaptcha');
    }
}

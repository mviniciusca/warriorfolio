<?php

namespace App\View\Components;

use App\Services\RecaptchaService;
use Illuminate\View\Component;

class Recaptcha extends Component
{
    public string $siteKey;

    public bool $enabled;

    public function __construct(RecaptchaService $recaptchaService)
    {
        $this->siteKey = $recaptchaService->getSiteKey();
        $this->enabled = $recaptchaService->isEnabled();
    }

    public function render()
    {
        return view('components.recaptcha');
    }
}

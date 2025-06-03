<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PasswordProtectedPage extends Component
{
    public $inputPassword = '';

    public $pageId;

    public $password;

    public $pageSlug;

    public $error = false;

    public $isUnlocking = false;

    public $showError = false;

    public function mount($password, $pageId)
    {
        $this->pageId = $pageId;
        $this->password = $password;

        // Get the page slug to construct proper URL
        $this->pageSlug = \App\Models\Page::where('id', $pageId)->value('slug') ?? '/';

        // If user already has access, redirect directly to content
        if (Session::has('page_access_'.$this->pageId)) {
            return redirect($this->getPageUrl().'?unlocked=true');
        }
    }

    private function getPageUrl()
    {
        return $this->pageSlug === '/' ? url('/') : url('/'.ltrim($this->pageSlug, '/'));
    }

    public function checkPassword()
    {
        // Check password using Hash::check for security
        if (Hash::check($this->inputPassword, $this->password)) {
            // Correct password - show unlocking state
            $this->isUnlocking = true;
            $this->error = false;
            $this->showError = false;

            // Create session
            Session::put('page_access_'.$this->pageId, true);

            // Small delay for visual feedback, then redirect
            $this->dispatch('redirect-after-delay', ['url' => $this->getPageUrl().'?unlocked=true']);
        } else {
            // Wrong password - show error state in button
            $this->error = true;
            $this->showError = true;
            $this->inputPassword = '';
            $this->isUnlocking = false;

            // Hide error after 2 seconds
            $this->dispatch('hide-error-after-delay');
        }
    }

    public function hideError()
    {
        $this->showError = false;
    }

    public function render()
    {
        return view('livewire.password-protected-page');
    }
}

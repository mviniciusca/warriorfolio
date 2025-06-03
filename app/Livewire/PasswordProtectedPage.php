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
            // Correct password - create session and redirect to content
            Session::put('page_access_'.$this->pageId, true);
            $this->error = false;

            return redirect($this->getPageUrl().'?unlocked=true');
        } else {
            // Wrong password
            $this->error = true;
            $this->inputPassword = '';
        }
    }

    public function render()
    {
        return view('livewire.password-protected-page');
    }
}

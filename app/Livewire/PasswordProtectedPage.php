<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PasswordProtectedPage extends Component
{
    public $inputPassword = '';

    public $pageId;

    public $password;

    public $error = false;

    public $showContent = false;

    public function mount($password, $pageId)
    {
        $this->pageId = $pageId;
        $this->password = $password;

        // Check if session already exists for this page
        if (Session::has('page_access_'.$this->pageId)) {
            $this->showContent = true;
        }
    }

    public function checkPassword()
    {
        // Simplified password check
        if ($this->inputPassword === $this->password) {
            // Correct password
            Session::put('page_access_'.$this->pageId, true);
            $this->showContent = true;
            $this->error = false;

            // Dispatch browser event to redirect with JavaScript
            $this->dispatch('password-unlocked');
        } else {
            // Wrong password
            $this->error = true;
            $this->inputPassword = '';
        }
    }

    public function logout()
    {
        // Remove session and lock content again
        Session::forget('page_access_'.$this->pageId);
        $this->showContent = false;
        $this->inputPassword = '';
        $this->error = false;

        // Dispatch browser event to redirect and remove unlocked parameter
        $this->dispatch('password-locked');
    }

    public function render()
    {
        return view('livewire.password-protected-page');
    }
}

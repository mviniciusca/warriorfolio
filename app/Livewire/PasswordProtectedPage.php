<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PasswordProtectedPage extends Component
{
    public $inputPassword = '';

    public $pageId;

    public $password;

    public $pageSlug;

    public $error = false;

    public $showContent = false;

    public function mount($password, $pageId)
    {
        $this->pageId = $pageId;
        $this->password = $password;

        // Get the page slug to construct proper URL
        $page = \App\Models\Page::find($pageId);
        $this->pageSlug = $page->slug ?? '/';

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

            // Construct the proper page URL
            $pageUrl = $this->pageSlug === '/' ? url('/') : url('/'.ltrim($this->pageSlug, '/'));

            return redirect($pageUrl.'?unlocked=true');
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

        // Construct the proper page URL
        $pageUrl = $this->pageSlug === '/' ? url('/') : url('/'.ltrim($this->pageSlug, '/'));

        return redirect($pageUrl);
    }

    public function render()
    {
        return view('livewire.password-protected-page');
    }
}

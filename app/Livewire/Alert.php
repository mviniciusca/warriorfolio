<?php

namespace App\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public bool $display = true;
    public string $id;
    public int $cookieExpirationTime = 60 * 60 * 24 * 7;
    public string $message;
    public bool $is_dismissible;
    public bool $is_active;
    public string $style;
    public string $cookieName;
    public string $cookieValue;

    public function render()
    {
        return view('livewire.alert', [
        ]);
    }

    public function close()
    {
        setcookie($this->cookieName, $this->cookieValue, time() + $this->cookieExpirationTime, '/');
        $this->display = false;
    }

    public function mount()
    {
        $this->cookieName = 'wf-' . $this->id;
        $this->cookieValue = 'displayed';
        if (isset($_COOKIE[$this->cookieName]) && $_COOKIE[$this->cookieName] === $this->cookieValue) {
            $this->display = false;
        }
    }
}

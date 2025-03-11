<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class DarkMode extends Component
{
    public $active;

    public $theme;

    public function mount(): void
    {
        if (isset($_COOKIE['theme'])) {
            $this->active = $_COOKIE['theme'] === 'dark';
        } else {
            $this->active = true;
            setcookie('theme', 'dark', time() + (86400 * 30), '/');
            session(['theme' => 'dark']);
        }

        $this->theme = $this->active ? 'dark' : 'light';
    }

    public function render(): View
    {
        return view('livewire.dark-mode', [
            'darkMode' => $this->toggleDarkMode(),
        ]);
    }

    /**
     * Toggle dark mode.
     * @return void
     */
    public function toggleDarkMode(): void
    {
        if ($this->active) {
            setcookie('theme', 'dark', time() + (86400 * 30), '/');
            session(['theme' => 'dark']);
            $this->js("document.documentElement.classList.add('dark')");
            $this->theme = 'light';
        } else {
            setcookie('theme', 'light', time() + (86400 * 30), '/');
            session(['theme' => 'light']);
            $this->js("document.documentElement.classList.remove('dark')");
            $this->theme = 'dark';
        }
    }
}

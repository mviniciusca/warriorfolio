<?php

namespace App\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $display = true;
    public function render()
    {
        return view('livewire.alert', [
        ]);
    }

    public function close()
    {
        // set cookie for 1 day
        setcookie('alert', 'closed', time() + 60 * 60 * 24, '/');
        $this->display = false;
    }

    public function mount()
    {
        if (isset($_COOKIE['alert']) && $_COOKIE['alert'] === 'closed') {
            $this->display = false;
        }
    }

}

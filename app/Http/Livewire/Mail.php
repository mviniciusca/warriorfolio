<?php

namespace App\Http\Livewire;

use App\Models\Mail as ModelsMail;
use Livewire\Component;

class Mail extends Component
{
    public ModelsMail $mail;

    protected $rules = [
        'mail.name' => 'required',
        'mail.email' => 'required|email',
        'mail.subject' => 'required',
        'mail.message' => 'required',
    ];

    public function render()
    {
        return view('livewire.mail');
    }

    public function mount(ModelsMail $mail)
    {
        $this->mail = $mail;
    }

    public function save()
    {
        $this->mail->save();
        $this->emit('saved');
    }
}

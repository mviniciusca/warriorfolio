<?php

namespace App\Http\Livewire;

use App\Models\Mail as ModelMail;
use Livewire\Component;

class Mail extends Component
{
    public ModelMail $mail;

    protected $rules = [
        'mail.name'     => 'required|min:5|max:32',
        'mail.email'    => 'required|email|regex:/^.+@.+$/i',
        'mail.subject'  => 'required|min:10|max:50',
        'mail.message'  => 'required|min:10|max:500',
    ];

    public function mount(ModelMail $mail)
    {
        $this->mail = $mail;
    }

    public function render()
    {
        return view('livewire.mail');
    }

    public function send()
    {
        $this->validate();
        $this->mail->save();
        $this->mail = new ModelMail();
        $this->emit('mailSent');
        session()->flash('message', 'Mail sent successfully.');
    }
}

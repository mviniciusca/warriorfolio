<?php

namespace App\Http\Livewire\Mail;

use App\Models\Mail;
use Livewire\Component;

class Inbox extends Component
{
    public Mail $mail;

    protected $listeners = [
       'email-deleted' => '$refresh',
    ];

    public function mount(Mail $mail)
    {
        $this->mail = $mail;
    }

    public function render()
    {
        return view('livewire.mail.inbox', [
            'mails' => $this->getEmails(),
        ]);
    }

    public function getEmails()
    {
        return $this->mail->all()->sortByDesc('created_at');
    }

    public function deleteEmail($id)
    {
        return $this->mail->find($id)->delete();
        $this->emit('email-deleted');
    }

}

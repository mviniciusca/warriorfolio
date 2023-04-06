<?php

namespace App\Http\Livewire\Mail;

use App\Models\Mail;
use Livewire\Component;

class ReadingPanel extends Component
{
    public Mail $mail;

    public function render()
    {
        return view('livewire.mail.reading-panel', [
                'message' => $this->getMessageProperrty($this->mail->id),
            ]);
    }

    public function mount(Mail $mail)
    {
        $this->mail = $mail;
    }

    public function getMessageProperrty($id)
    {
        return $this->mail->find($id);
    }

}

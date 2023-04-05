<?php

namespace App\Http\Livewire\Mail;

use App\Models\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Inbox extends Component
{
    use WithPagination;
    public Mail $mail;

    public $filter = 'inbox';

    public function mount(Mail $mail)
    {
        $this->mail = $mail;
    }

    public function render()
    {
        return view('livewire.mail.inbox',[
            'messages' => $this->getFilteredMessagesProperty(),
        ]);
    }

    /**
     * Get the filtered messages
     *
     * @return void
     */

    public function getFilteredMessagesProperty()
    {
        if($this->filter == 'inbox'){
            return $this->inbox();
        }elseif($this->filter == 'starred'){
            return $this->starred();
        }elseif($this->filter == 'trashed'){
            return $this->trashed();
        }elseif($this->filter == 'sent'){
            return $this->sent();
        }
    }

    /**
     * Set the filter
     *
     * @param [type] $filter
     * @return void
     */

    public function setFilter($filter)
    {
        $this->filter = $filter;
    }


    public function inbox()
    {
        return $this->mail->where('is_trashed', false)->where('is_sent', false)->paginate(10, ['*'], 'inboxPage');
    }

    public function starred()
    {
        return $this->mail->where('is_starred', true)->where('is_trashed', false)->paginate(10, ['*'], 'starredPage');
    }

    public function trashed()
    {
        return $this->mail->where('is_trashed', true)->paginate(10, ['*'], 'trashedPage');
    }

    public function sent()
    {
        return $this->mail->where('is_trashed', false)->where('is_sent', true)->paginate(10, ['*'], 'sentPage');
    }


    /**
     * Toggle the message as favorite or not
     *
     * @param [type] $id
     * @return void
     */
    public function toggleFavorite($id)
    {
        $message = $this->mail->find($id);
        $message->is_starred = !$message->is_starred;
        $message->save();
    }

    /**
     * Toggle the message as trashed or not
     *
     * @param [type] $id
     * @return void
     */
    public function toggleTrash($id)
    {
        $message = $this->mail->find($id);
        $message->is_trashed = !$message->is_trashed;
        $message->save();
    }




}

<?php

namespace App\Http\Livewire\Mail;

use App\Models\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Inbox extends Component
{

    use WithPagination;
    public $filter;
    public Mail $mail;


    protected $listeners = [
        'setId'          => '$refresh',
    ];

    /**
     * Mount the component
    */
    public function mount()
    {
        $this->mail = new Mail();
        $this->filter = 'inbox';
    }

    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire.mail.inbox',[
            'messages'      => $this->getMailsProperty($this->filter),
            'inboxCount'    => $this->getInboxCountProperty(),
            'sentCount'     => $this->getSentCountProperty(),
            'starredCount'  => $this->getStarredCountProperty(),
            'trashedCount'  => $this->getTrashedCountProperty(),
        ]);
    }

    /**
     * Set the value of filter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    /**
     * Applies the filter to the mail query and returns the result with pagination
     */
    public function getMailsProperty($filter)
    {
        if ($filter == 'inbox'){
            return $this->mail->where('is_trashed', false)->where('is_sent', false)->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($filter == 'sent'){
            return $this->mail->where('is_trashed', false)->where('is_sent', true)->orderBy('created_at', 'desc')->paginate(10);
        } elseif($filter == 'starred'){
            return $this->mail->where('is_trashed', false)->where('is_starred', true)->where('is_sent', false)->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($filter == 'trashed') {
            return $this->mail->where('is_trashed', true)->orderBy('updated_at', 'desc')->paginate(10);
        }
    }

    public function getInboxCountProperty()
    {
        return $this->mail->where('is_trashed', false)->where('is_sent', false)->count();
    }

    public function getSentCountProperty()
    {
        return $this->mail->where('is_trashed', false)->where('is_sent', true)->count();
    }

    public function getStarredCountProperty()
    {
        return $this->mail->where('is_trashed', false)->where('is_starred', true)->where('is_sent', false)->count();
    }

    public function getTrashedCountProperty()
    {
        return $this->mail->where('is_trashed', true)->count();
    }


    /**
     * Send the email to trash folder or restore it from trash
     *
     */
    public function toggleTrash($id)
    {
        $mail = $this->mail->find($id);
        $mail->is_trashed = !$mail->is_trashed;
        $mail->save();
    }

    /**
     * Mark the email as starred or unstarred
     */
    public function toggleStarred($id)
    {
        $mail = $this->mail->find($id);
        $mail->is_starred = !$mail->is_starred;
        $mail->save();
    }

    public function destroyMessage($id)
    {
        $mail = $this->mail->find($id);
        $mail->delete();
    }

    public function showMessage($id)
    {
        $this->emit('showMessage', $id);
    }


}

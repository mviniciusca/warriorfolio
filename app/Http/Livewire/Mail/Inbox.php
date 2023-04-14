<?php

namespace App\Http\Livewire\Mail;

use App\Models\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Inbox extends Component
{

    use WithPagination;
    public $filter;
    public $messageId;
    public Mail $mail;

    /**
     * Mount the component
    */
    public function mount()
    {
        $this->mail = new Mail();
        $this->filter = 'inbox';
        $this->messageId = null;
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
            'show'          => $this->showMessage($this->messageId),
        ]);
    }

    /**
     * Set the value of filter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->messageId = null;
        $this->resetPage();
    }

    /**
     * Set the value of messageId and mark the message as read
     */
    public function setMessageId($id)
    {
        $this->messageId = $id;
        $this->setAsRead($id);
    }

    /**
     * Get the mails
     */
    public function getMailsProperty($filter)
    {
        if ($filter == 'inbox'){
            return $this->mail->where('is_trashed', false)->where('is_sent', false)->orderBy('created_at', 'desc')->paginate(15);
        } elseif ($filter == 'sent'){
            return $this->mail->where('is_trashed', false)->where('is_sent', true)->orderBy('created_at', 'desc')->paginate(15);
        } elseif($filter == 'starred'){
            return $this->mail->where('is_trashed', false)->where('is_starred', true)->where('is_sent', false)->orderBy('created_at', 'desc')->paginate(15);
        } elseif ($filter == 'trashed') {
            return $this->mail->where('is_trashed', true)->orderBy('created_at', 'desc')->paginate(15);
        }
    }

    /**
     * Get the count of inbox messages
     *
     * @return void
     */
    public function getInboxCountProperty()
    {
        return $this->mail->where('is_trashed', false)->where('is_sent', false)->where('is_read', false)->count();
    }

    /**
     * Get the count of sent messages
     *
     * @return void
     */
    public function getSentCountProperty()
    {
        return $this->mail->where('is_trashed', false)->where('is_sent', true)->count();
    }

    /**
     * Get the count of starred messages
     *
     * @return void
     */
    public function getStarredCountProperty()
    {
        return $this->mail->where('is_trashed', false)->where('is_starred', true)->where('is_sent', false)->count();
    }

    /**
     * Get the count of trashed messages
     *
     * @return void
     */
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

    /**
     * Set the message as read
     *
     * @param [type] $id
     * @return void
     */
    public function setAsRead($id)
    {
        $mail = $this->mail->find($id);
        $mail->is_read = true;
        $mail->save();

    }

    /**
     * Close Message on Reading Panel
     *
     * @return void
     */
    public function closeMessage()
    {
        $this->messageId = null;
    }

    /**
     * Set the message as unread
     *
     * @param [type] $id
     * @return void
     */
    public function setAsUnread($id)
    {
        $mail = $this->mail->find($id);
        $mail->is_read = false;
        $mail->save();
    }

    /**
     * Delete the message permanently
     *
     * @param [type] $id
     * @return void
     */
    public function destroyMessage($id)
    {
        $mail = $this->mail->find($id);
        $mail->delete();
    }

    /**
     * Show the message
     *
     * @param [type] $messageId
     * @return void
     */
    public function showMessage($messageId)
    {
        return $this->mail->find($messageId);
    }

}

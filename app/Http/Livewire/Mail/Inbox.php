<?php

namespace App\Http\Livewire\Mail;

use App\Models\Mail;
use Livewire\Component;

class Inbox extends Component
    {
        public Mail $mail;

        protected $listeners = [
            'email-deleted'     => '$refresh',
            'email-read'        => '$refresh',
            'email-starred'     => '$refresh',

        ];

        public function mount(Mail $mail)
        {
            $this->mail = $mail;
        }

        public function render()
        {
            return view('livewire.mail.inbox', [
                'mails'         => $this->getEmails(),
                'unreadCount'   => $this->getUnreadCount(),
                'starredCount'  => $this->getStarredCount(),
                'trashCount'    => $this->getTrashCount(),
                'sentCount'     => $this->getSentCount(),
            ]);
        }

        public function getEmails()
        {
            // get emails that are not trashed and not sent
            return $this->mail->where('is_trashed', false)
                                ->where('is_sent', false)
                                ->get()
                                ->sortByDesc('created_at');
        }


        public function markStar($id)
        {
            $mail = $this->mail->find($id);
            $mail->is_starred = !$mail->is_starred;
            $mail->save();
            $this->emitSelf('email-starred');
        }

        public function markRead($id)
        {
            $mail = $this->mail->find($id);
            $mail->is_read = !$mail->is_read;
            $mail->save();
            $this->emitSelf('email-read');
        }

        public function markTrash($id)
        {
            $mail = $this->mail->find($id);
            $mail->is_trashed = !$mail->is_trashed;
            $mail->save();
            $this->emitSelf('email-deleted');
        }

        public function getUnreadCount()
        {
            return $this->mail->where('is_read', false)
                                ->where('is_trashed', false)
                                ->where('is_sent', false)
                                ->count();
        }

        public function getStarredCount()
        {
            return $this->mail->where('is_starred', true)
                                ->where('is_trashed', false)
                                ->where('is_sent', false)
                                ->count();
        }

        public function getTrashCount()
        {
            return $this->mail->where('is_trashed', true)
                                ->where('is_sent', false)
                                ->count();
        }

        public function getSentCount()
        {
            return $this->mail->where('is_sent', true)
                                ->count();
        }

}

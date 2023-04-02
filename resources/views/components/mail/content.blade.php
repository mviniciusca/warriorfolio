@props(['mails'])

<div>
    {{-- Action Menu --}}
   <x-mail.action-menu />

    {{-- Message --}}
    @foreach ($mails as $mail)
        <x-mail.message
        :id="$mail->id"
        :name="$mail->name"
        :email="$mail->email"
        :subject="$mail->subject"
        :datetime="$mail->created_at"
        />
    @endforeach

</div>

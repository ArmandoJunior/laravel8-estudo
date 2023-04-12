<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserEnrollmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public readonly User $user;
    public readonly Event $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $event)
    {
        //
        $this->user = $user;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Confirmação de Inscrição')
            ->replyTo('armandojrn@gmail.com')
            ->view('emails.enrollment-user');
    }
}

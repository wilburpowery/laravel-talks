<?php

namespace App\Mail;

use App\Talk;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactTalkSpeaker extends Mailable
{
    use Queueable, SerializesModels;

    public $talk;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Talk $talk, $user)
    {
        $this->talk = $talk;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact-speaker-for-talk');
    }
}

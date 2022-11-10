<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];
    public $token = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $token)
    {
        $this->data = $data;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Mail from TwitSoft.com')
            ->view('login.resetPassword');
    }
}

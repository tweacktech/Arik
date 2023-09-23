<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Update extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $title;
    public $body_of_message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $title, $body_of_message)
    {
        $this->username = $username;
        $this->title = $title;
        $this->body_of_message = $body_of_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.general_message');
    }
}

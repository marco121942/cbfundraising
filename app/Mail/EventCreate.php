<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventCreate extends Mailable
{
    use Queueable, SerializesModels;

    public $userName, $enlace;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $enlace)
    {
        $this->userName = $userName;
        $this->enlace = $enlace;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.event-created');
    }
}

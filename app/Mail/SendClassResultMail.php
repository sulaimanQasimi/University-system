<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendClassResultMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $result;
    public function __construct($result)
    {
        $this->result=$result;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { $result=$this->result;
        return $this->markdown('emails.classes.result',compact('result'));
    }
}

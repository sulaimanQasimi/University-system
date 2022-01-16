<?php

namespace App\Mail;

use App\Models\Classes;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendClassScheduleMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $class;
    public function __construct( $class)
    {
        $this->class=Classes::findOrFail($class);
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $class=$this->class;
        return $this->markdown('emails.classes.schedule',compact('class'))->subject("Class Schedule of ".$class->name);
    }
}

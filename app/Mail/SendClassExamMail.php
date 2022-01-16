<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendClassExamMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $exam;
//    public $replyTo='sulaiman@kabul.edu.af';
    public function __construct($exam)
    {
        $this->exam=$exam;
//        foreach ($exam->students as $student) {
//           $this->bcc($student->user->email);
//        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $exam=$this->exam;
        return $this->markdown('emails.classes.exam',compact('exam'));
    }
}

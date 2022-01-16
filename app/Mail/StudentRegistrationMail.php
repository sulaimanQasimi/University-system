<?php

namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $student;
    public function __construct($id)
    {
        $this->student=$id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $student=Student::findOrFail($this->student);
        return $this->from('no-reply@kabul.edu.af')->view('mail.registration',compact('student'))->subject('محصل جدید وارد سیستم شد');
    }
}

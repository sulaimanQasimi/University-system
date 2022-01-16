<?php

namespace App\Mail\Student\class;

use App\Models\ClassStudent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Set extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $class_id;
    protected $student_id;
    public function __construct($class,$student)
    {
        $this->class_id=$class;
        $this->student_id=$student
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $class=ClassStudent::where('class_id',$this->class_id)->where('student_id',$this->student_id)->first();
        return $this->view('view.name');
    }
}

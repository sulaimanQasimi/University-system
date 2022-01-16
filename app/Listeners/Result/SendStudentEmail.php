<?php

namespace App\listeners\Result;

use App\Events\ExamResultEmail;
use Illuminate\Support\Facades\Mail;

class SendStudentEmail
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }
    //////////////////////////////////////////////
    ///
    ///
    ///
    /// /////////////////////////////////////////
    /**
     * Handle the event.
     *
     * @param  ExamResultEmail $event
     *
     * @return void
     */
    public function handle(ExamResultEmail $event)
    {
        foreach ($event->exam->Examstudents as $student) {
            Mail::to($student->student->user->email)->send(new \App\Mail\SendClassResultMail($student));
        }
    }

}

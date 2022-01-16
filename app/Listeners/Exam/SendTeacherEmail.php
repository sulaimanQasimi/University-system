<?php

namespace App\listeners\Exam;

use App\Events\ClassExamEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTeacherEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ClassExamEmail  $event
     * @return void
     */
    public function handle(ClassExamEmail $event)
    {

        $exam = $event->exam;
        Mail::to($exam->teacher->user->email)->send(new \App\Mail\SendClassExamMail($exam));
    }
}

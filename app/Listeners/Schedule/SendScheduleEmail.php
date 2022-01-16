<?php

namespace App\listeners\Schedule;

use App\Events\ClassScheduleEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendScheduleEmail
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
     * @param  ClassScheduleEmail  $event
     * @return void
     */
    public function handle(ClassScheduleEmail $event)
    {
        // $student = [''];
        foreach ($event->class->students as $student) {
            Mail::to($student->user->email)->send(new \App\Mail\SendClassScheduleMail($event->class->id));

        }

        foreach ($event->class->teachers as $teacher) {
            Mail::to($teacher->user->email)->send(new \App\Mail\SendClassScheduleMail($event->class->id));
        }

    }
}

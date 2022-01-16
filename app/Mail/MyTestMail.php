<?php

namespace App\Mail;

use App\Models\Student;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $student=Student::all();
        return $this->from(['address' => 'example@example.com', 'name' => 'App Name'])->view('mail',compact('student'));
    }
}

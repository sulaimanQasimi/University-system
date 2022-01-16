<?php

namespace App\Events;

use App\Models\ClassExam;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClassExamEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $exam;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct($exam_id)
    {
        $this->exam = ClassExam::findOrFail($exam_id);

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
}

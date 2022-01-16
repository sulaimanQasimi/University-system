<?php

namespace App\Events;

use App\Models\ClassExam;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExamResultEmail
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
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

<?php

namespace App\Events;

use App\Models\Classes;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClassChangeEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $class;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $class)
    {
        $this->class=Classes::findOrFail($class);
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

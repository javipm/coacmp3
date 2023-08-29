<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AudiosProcessed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $processed;

    public $errors;

    /**
     * Create a new event instance.
     */
    public function __construct(array $processed, array $errors)
    {
        $this->processed = $processed;
        $this->errors = $errors;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}

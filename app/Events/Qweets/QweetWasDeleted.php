<?php

namespace App\Events\Qweets;

use App\Qweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QweetWasDeleted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The qweet property.
     *
     * @var Qweet $qweet
     */
    protected $qweet;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Qweet $qweet)
    {
        $this->qweet = $qweet;
    }

    /**
     * The payload to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'id' => $this->qweet->id
        ];
    }

    /**
     * Set the event name to be displayed when it is broadcast.
     *
     * @return void
     */
    public function broadcastAs()
    {
        return 'QweetWasDeleted';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('qweets');
    }
}

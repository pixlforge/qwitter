<?php

namespace App\Events\Qweets;

use App\Http\Resources\QweetResource;
use App\Qweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QweetWasCreated implements ShouldBroadcast
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
        return (QweetResource::make($this->qweet))->jsonSerialize();
    }

    /**
     * Set the event name to be displayed when it is broadcast.
     *
     * @return void
     */
    public function broadcastAs()
    {
        return 'QweetWasCreated';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return $this->qweet->user->followers->map(function ($user) {
            return new PrivateChannel('timeline.' . $user->id);
        })->toArray();
    }
}

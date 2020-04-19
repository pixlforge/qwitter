<?php

namespace App\Events\Qweets;

use App\User;
use App\Qweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QweetReqweetsUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The user property.
     *
     * @var User $user
     */
    protected $user;

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
    public function __construct(User $user, Qweet $qweet)
    {
        $this->user = $user;

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
            'id' => $this->qweet->id,
            'user_id' => $this->user->id,
            'count' => $this->qweet->reqweets->count(),
        ];
    }

    /**
     * Set the event name to be displayed when it is broadcast.
     *
     * @return void
     */
    public function broadcastAs()
    {
        return 'QweetReqweetsUpdated';
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

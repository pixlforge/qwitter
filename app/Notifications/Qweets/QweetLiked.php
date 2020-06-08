<?php

namespace App\Notifications\Qweets;

use App\User;
use App\Qweet;
use Illuminate\Bus\Queueable;
use App\Http\Resources\UserResource;
use App\Http\Resources\QweetResource;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\DatabaseNotificationChannel;

class QweetLiked extends Notification implements ShouldQueue
{
    use Queueable;

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
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Qweet $qweet)
    {
        $this->user = $user;

        $this->qweet = $qweet;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            DatabaseNotificationChannel::class,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user' => UserResource::make($this->user),
            'qweet' => QweetResource::make($this->qweet)
        ];
    }
}

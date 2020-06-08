<?php

namespace App\Notifications;

use ReflectionClass;
use Illuminate\Notifications\Notification;

class DatabaseNotificationChannel
{
    /**
     * Save a notification in the database.
     *
     * @param Model $notifiable
     * @param Notification $notification
     * @return Model
     */
    public function send($notifiable, Notification $notification)
    {
        return $notifiable->routeNotificationFor('database')->create([
            'id' => $notification->id,
            'type' => (new ReflectionClass($notification))->getShortName(),
            'data' => $notification->toArray($notifiable),
            'read_at' => null,
        ]);
    }
}
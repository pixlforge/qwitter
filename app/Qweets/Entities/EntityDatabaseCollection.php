<?php

namespace App\Qweets\Entities;

use App\User;
use Illuminate\Database\Eloquent\Collection;

class EntityDatabaseCollection extends Collection
{
    /**
     * Returns a collection of users.
     *
     * @return Collection
     */
    public function users(): Collection
    {
        return User::whereIn('username', $this->pluck('body_plain'))->get();
    }
}
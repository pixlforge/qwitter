<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qweet extends Model
{
    /**
     * User relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

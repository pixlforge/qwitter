<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qweet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'type',
    ];
    
    /**
     * User relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Original qweet relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function originalQweet()
    {
        return $this->hasOne(Qweet::class, 'id', 'original_qweet_id');
    }
}

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
        'body', 'type', 'original_qweet_id',
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

    /**
     * Likes relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Reqweets relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reqweets()
    {
        return $this->hasMany(Qweet::class, 'original_qweet_id');
    }

    /**
     * Reqweeted qweet relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reqweetedQweet()
    {
        return $this->hasOne(Qweet::class, 'original_qweet_id', 'id');
    }
}

<?php

namespace App;

use App\Qweets\QweetType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the Gravatar avatar.
     *
     * @return string
     */
    public function getAvatarUrl()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp';
    }

    /**
     * Checks whether or not the user has already
     * liked a particular qweet.
     *
     * @param Qweet $qweet
     * @return boolean
     */
    public function hasLiked(Qweet $qweet)
    {
        return $this->likes->contains('qweet_id', $qweet->id);
    }

    /**
     * Following relastionship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function following()
    {
        return $this->belongsToMany(
            User::class, 'followers', 'user_id', 'following_id'
        );
    }

    /**
     * Followers relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(
            User::class, 'followers', 'following_id', 'user_id'
        );
    }

    /**
     * Qweets relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qweets()
    {
        return $this->hasMany(Qweet::class);
    }

    /**
     * Qweets from other users that are followed.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function qweetsFromFollowing()
    {
        return $this->hasManyThrough(
            Qweet::class, Follower::class, 'user_id', 'user_id', 'id', 'following_id'
        );
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
        return $this->hasMany(Qweet::class)
            ->where('type', QweetType::REQWEET)
            ->orWhere('type', QweetType::QUOTE);
    }
}

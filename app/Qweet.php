<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Qweets\Entities\EntityExtractor;
use App\Qweets\Entities\EntityType;
use Illuminate\Database\Eloquent\Builder;

class Qweet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'type', 'original_qweet_id', 'parent_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function (Qweet $qweet) {
            $qweet->entities()->createMany(
                (new EntityExtractor($qweet->body))->getAllEntities()
            );
        });
    }

    /**
     * Scope query by top level parent qweets.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeParent(Builder $builder): Builder
    {
        return $builder->whereNull('parent_id');
    }
    
    /**
     * User relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parents()
    {
        $base = $this;
        $parents = [];

        while ($base->parentQweet) {
            $parents[] = $base->parentQweet;
            $base = $base->parentQweet;
        }

        return collect($parents);
    }

    /**
     * Parent qweet relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentQweet()
    {
        return $this->belongsTo(Qweet::class, 'parent_id');
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

    /**
     * Qweet media relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media()
    {
        return $this->hasMany(QweetMedia::class);
    }

    /**
     * Replies relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Qweet::class, 'parent_id');
    }

    /**
     * Entities relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entities()
    {
        return $this->hasMany(Entity::class);
    }

    /**
     * Mentions type entities relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mentions()
    {
        return $this->hasMany(Entity::class)
            ->whereType(EntityType::MENTION);
    }
}

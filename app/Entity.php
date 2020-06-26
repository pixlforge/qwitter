<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Qweets\Entities\EntityDatabaseCollection;

class Entity extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function newCollection(array $models = [])
    {
        return new EntityDatabaseCollection($models);
    }
}

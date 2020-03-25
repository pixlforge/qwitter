<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Qweet;
use App\User;
use Faker\Generator as Faker;

$factory->define(Qweet::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'body' => $faker->paragraph
    ];
});

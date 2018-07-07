<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\History::class, function (Faker $faker) {
    return [
        'incident' => $faker->sentence,
        'user_id' => function(){
            return User::all()->random();
        },
        'created_at' => $faker->dateTimeThisMonth,
    ];
});

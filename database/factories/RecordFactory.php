<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Record::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first(),
        'type' => $faker->randomElement($array = array ('In','Out')),
        'created_at' => $faker->dateTimeThisMonth,
    ];
});

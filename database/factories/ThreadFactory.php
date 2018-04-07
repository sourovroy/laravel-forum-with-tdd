<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Thread::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        },
        'channel_id' => function(){
            return factory(App\Models\Channel::class)->create()->id;
        }
    ];
});
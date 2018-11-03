<?php

use Faker\Generator as Faker;

//use App;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
    	'user_id' => factory(App\User::class)->create()['id'],
    	'title' => $faker->sentence,
    	'body' => implode(' ', $faker->paragraphs)
        //
    ];
});

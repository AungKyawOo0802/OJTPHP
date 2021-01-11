<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
       'title' => $faker->sentence,
       'description' => $faker->sentence,
       'status' => 1,
       'create_user_id' => 1,
       'updated_user_id' => 1,
    ];
});

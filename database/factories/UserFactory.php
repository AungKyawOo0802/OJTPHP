<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" =>bcrypt("123456"),
            "profile" => "avatar.jpg",
            "type" => 0,
            "phone" => "09790753070",
            "address" => "Tarmwe, Yangon",
            "dob" => "2000-12-1",
            "create_user_id" => 1,
            "updated_user_id" => 1,
            "created_at" => now(),
            "updated_at" => now(),
    ];
});

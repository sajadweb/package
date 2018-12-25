<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Packages\User\Model\Admin::class, function (Faker\Generator $faker) {
    static $password;
    $email=$faker->unique()->safeEmail;
    return [
        'name' => $faker->name,
        'username' => collect(explode('@',$email))[0],
        'email' => $email,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'status' => $faker->boolean(),
        'created_at' => $faker->time('Y-m-d H:i:s'),
        'updated_at' => $faker->time('Y-m-d H:i:s')
    ];
});

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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'id' => 1,
        'name' => 'Joris Schelfhout',
        'email' => 'hawkleaf@hotmail.com',
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph(30),
        'user_id' => factory(App\User::class)->make()->id,
        'published_at' => $faker->dateTime(),
        'published' => ($faker->boolean) ? 'true' : 'false',
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->sentence,
        'user_id' => factory(App\User::class)->make()->id,
        'post_id' => rand(1,20)
    ];
});

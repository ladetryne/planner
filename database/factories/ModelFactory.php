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
		// USERS
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
		// Tasks
$factory->define(App\Task::class, function (Faker\Generator $faker) {
    $randomPrio = array(
    "Høy",
    "Middels",
    "Lav",
    );
    $p = $randomPrio [array_rand($randomPrio )];

    return [
        'user_id' => rand(1, 2),
        'name' => $faker->name,
        'viktighet' => $p,
        'info' => $faker->catchPhrase,
        'created_at' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(0,4))
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'task_id' => rand(1, 12),
        'body' => str_random(100), 
        'created_at' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(0,4)),
    ];
});














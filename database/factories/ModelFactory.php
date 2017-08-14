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
        'created_at' => \Carbon\Carbon::now()
    ];
});
		// Tasks
$factory->define(App\Task::class, function (Faker\Generator $faker) {
    $randomPrio = array(
    "Høy",
    "Middels",
    "Lav",
    );
    $prio = $randomPrio [array_rand($randomPrio )];
    $randomColor = array(
    "gtaskblue",
    "gtaskyellow",
    "gtaskred",
    "gtaskpurple",
    "gtaskgreen",
    "gtaskpink",
    );
    $color = $randomColor [array_rand($randomColor )];

    return [
        'user_id' => rand(1, 2),
        'project_id' => rand(1, 3),
        'name' => $faker->catchPhrase,
        'viktighet' => $prio,
        'info' => $faker->sentence,
        'arbeidstimer' => rand(8, 150),
        'ferdig' => rand(1, 100),
        'milestone' => false,
        'farge' => $color,
        'start_dato' => \Carbon\Carbon::now()->subDays(rand(1,30))->subWeeks(rand(0,6))->subMonths(rand(1,3)),
        'slutt_dato' => \Carbon\Carbon::now()->addDays(rand(1,30))->addWeeks(rand(7,12))->addMonths(rand(3,12)),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'task_id' => rand(1, 12),
        'body' => str_random(100), 
        'created_at' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(0,4)),
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'start_dato' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(1,7))->subMonths(rand(3,12)),
        'slutt_dato' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(1,7))->subMonths(rand(3,12)),
        'created_at' => \Carbon\Carbon::now()->subSeconds(rand(0, 59))->subHours(rand(0, 23))->subDays(rand(0,4)),
        'body' => $faker->sentence
    ];
});














<?php

use Faker\Generator as Faker;

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

$factory->define(App\Attendance::class, function (Faker $faker) {
    return [
        'emp_id' => 'EMP002',
        'circle' => 'up',
        'manager' => $faker->name,
        'name' => $faker->name,
        'date' => '2018-12-25',
        'timeout' => '1',
        'project' => $faker->name
    ];
});

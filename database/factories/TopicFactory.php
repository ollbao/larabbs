<?php

use Faker\Generator as Faker;
use App\Models\Topic;

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

$factory->define(Topic::class, function (Faker $faker) {

    $sentence = $faker->sentence();
    $body = $faker->text();
    // 随机取一个月以内的时间
    $time = $faker->dateTimeThisMonth();
    return [
        'title' => $sentence,
        'body' => $body,
        'created_at' => $time,
        'updated_at' => $time
    ];
});

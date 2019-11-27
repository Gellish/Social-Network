<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
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

$factory->define(App\Model\user\user::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->name,
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'cellphone' => $faker->phoneNumber,
        'address' =>    $faker->address,
        'email_verified_at' => now(),
        'profile_image' => 'http://via.placeholder.com/150x150',
        'password' =>  bcrypt('Llvaj101'), // secret
        'gender' => $faker->randomElement($array = array ('male', 'female')) ,
        'remember_token' => str_random(10),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

$factory->define(App\Model\user\message::class, function (Faker $faker) {
    do {
        $from = rand(1, 15);
        $to = rand(1, 15);
    } while ($from === $to);

    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence
    ];
});

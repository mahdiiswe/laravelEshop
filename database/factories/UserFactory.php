<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
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

$factory->define(User::class, function (Faker $faker) {
    return array(
        'name' => $faker->name('male'),
        'email' => $faker->email,
        'phone_number'=>$faker->phoneNumber,
        'password'=>bcrypt('123456'),
        'email_verified_at' => \Carbon\Carbon::now(),
    );
});

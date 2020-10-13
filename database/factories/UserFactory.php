<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use App\User;
use Illuminate\Support\Str;
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

    $roleId = Role::where('name', '=', Config::get('constants.db.roles.customer'))->first();
    return [
        'name' => $faker->firstName,
        'role_id' => $roleId,
        'email' => $faker->unique()->freeEmail,
        'email_verified_at' => now(),
        'password' =>'$2y$10$BuFNdj6U.yf7zFXNLRmv7eg2fwjbUQbVD4TFwvefZEt/xN1yi6FE.',
        'remember_token' => Str::random(10)
    ];
});

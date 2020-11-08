<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\Status;
use App\User;
use Faker\Generator as Faker;
use Faker\Provider\ro_RO\PhoneNumber as FakerPhone;


$factory->define(Order::class, function (Faker $faker) {
    $user = User::all()->random(1)->toArray();
    $status_id = Status::all('id')->random(1)->toArray();

    return [
        'user_id' => $user[0]['id'],
        'status_id' => $status_id[0]['id'],
        'name' => $user[0]['name'],
        'surname' => $faker->lastName,
        'phone' => FakerPhone::tollFreePhoneNumber(),
        'email' => $user[0]['email'],
    ];
});

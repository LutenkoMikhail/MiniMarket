<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $category_id = Category::all('id')->random(1)->toArray();
    return [
        'category_id' => $category_id[0]['id'],
        'name' => $faker->word,
        'description' => $faker->realText(25),
        'image' => $faker->image('public/storage/images/products', 400, 300, null, true),
        'price' =>  $faker->randomFloat(2, 1, 99),
    ];
});

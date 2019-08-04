<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $word = $faker->word;
    return [
        'slug' => $word,
        'name' => Str::ucfirst($word),
    ];
});

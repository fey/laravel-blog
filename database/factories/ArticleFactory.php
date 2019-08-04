<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $name = $faker->sentence(6, true);
    $body = $faker->sentences(10, true);
    return [
        'name'        => $name,
        'body'        => $body,
        'category_id' => 1,
        'user_id'     => 1,
    ];
});

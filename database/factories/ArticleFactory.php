<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function () {
    $faker = \Faker\Factory::create('ru_RU');
    // $name = $faker->sentence(6, true);
    $body = $faker->realText(1000);
    return [
        'name'        => Str::words($body, 5, ''),
        'body'        => $body,
        'category_id' => 1,
        'user_id'     => 1,
    ];
});

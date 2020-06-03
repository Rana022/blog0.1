<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = str::slug($title, '-');
    $arr = [1,2];
    return [
        'user_id' => Arr::random($arr),
        'title' => $title,
        'slug' => $slug,
        'image' => 'default.png',
        'body' => $faker->paragraph,
        'body' => $faker->paragraph,
    ];
});

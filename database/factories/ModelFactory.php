<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// Users
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Permission;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});



// First User
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'admin admin',
        'email' => 'admin@example.org',
        'password' => bcrypt('admin'),
        'remember_token' => str_random(10),
    ];
}, 'admin');


// Pages
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Page::class, function (Faker\Generator $faker) {

    $title = $faker->sentence;

    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'title' => $title,
        'uri' => str_slug($title),
        'image' => $faker->image,
        'body' => $faker->paragraph(25),
        'published' => $faker->boolean(90),
    ];
});


// Comments that belongs to the first 10 users
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    $title = $faker->sentence;

    return [
        'user_id' => rand(1, 11),
        'page_id' => function () {
            return factory('App\Page')->create()->id;
        },
        'body' => $faker->paragraph(5),
    ];
});


// Tags
$factory->define(Napso\Lunytags\Models\Tag::class, function (Faker\Generator $faker) {
    $name = $faker->unique()->colorName;
    return [
        'name' => $name,
        'slug' => str_slug($name),
    ];
});


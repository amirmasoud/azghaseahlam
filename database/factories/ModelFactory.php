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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
    static $i = 0;
    return [
		'link' => $faker->url,
		'low_resolution' => $faker->imageUrl($width = 320, $height = 320),
		'thumbnail' => $faker->imageUrl($width = 150, $height = 150),
		'standard_resolution' => $faker->imageUrl($width = 640, $height = 640),
		'caption_text' => $faker->realText($maxNbChars = 100),
        'created_time' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now'),
		'image_id' => $i++,
		'profile_id' => '1',
    ];
});

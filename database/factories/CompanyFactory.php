<?php 
use Faker\Generator as Faker;

$factory->define(App\Models\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->email,
        'logo' => 'logos/default.png',
        'website' => $faker->url,
    ];
});

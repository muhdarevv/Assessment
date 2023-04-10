<?php
use Faker\Generator as Faker;

$factory->define(App\Models\Employee::class, function (Faker $faker) {
    $companies = App\Models\Company::pluck('id')->toArray();
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'company_id' => $faker->randomElement($companies),
    ];
});

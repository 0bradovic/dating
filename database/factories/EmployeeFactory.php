<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        //
        'username' => 'Employee1',
        'password' => bcrypt('Employee1'),
        'email' => 'employee1@email.com',
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'nickname' => 'Janey',
        'looking_for' => 'Male',
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'language' => 'English',
        'country' => 'Serbia',
        'city' => 'Belgrade',
        'height' => '1.5',
        'weight' => '50.0',
        'body_type' => 'Fit',
        'hair_color' => 'Black',
        'eye_color' => 'Blue',
        'gender' => 'Female',
        'education' => 'Elementary School',
        'smoking' => 'Light Smoker',
        'drinking' => 'Heavy Drinker',
        'relationship' => "It's Complicated",
        'children' => 'No',
        'nationality' => 'Serbian',
        'occupation' => 'None',
        'heading' => "I'm too good!",
        'about' => "...........",
        'credit_card_number' => "555-666-333-777",
        'employee_type_id' => '1',
    ];
});

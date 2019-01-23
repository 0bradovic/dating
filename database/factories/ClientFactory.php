<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        
        'username' => 'Client1',
        'email' => 'client1@email.com',
        'password' => bcrypt('Client1'),
        'first_name' => 'John',
        'last_name' => 'Doe',
        'nickname' => 'Johnny',
        'looking_for' => 'Female',
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'language' => 'English',
        'country' => 'Serbia',
        'city' => 'Nis',
        'height' => '180.0',
        'weight' => '105.0',
        'hair_color' => 'Black',
        'eye_color' => 'Green',
        'gender' => 'Male',
        'smoking' => 'Heavy smoker',
        'drinking' => 'Light drinker',
        'relationship' => 'Married',
        'children' => 'Yes',
        'education' => 'Secondary school',
        'heading' => "I'm Batman",
        'about' => "I'm superhero",
        'occupation' => 'Beating bad guys',
        'nationality' => 'Serbian',
        'credit' => '1000',
        'credit_card_number' => '222-333-666-999',
        'phone_number' => '064555333',
        'address' => 'Neznanih junaka bb',
        'client_type_id' => '1',
    ];
});

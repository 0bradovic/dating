<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        //
        'username' => 'Admin1',
        'password' => bcrypt('Admin1'),
        'email' => 'admin1@email.com'
    ];
});

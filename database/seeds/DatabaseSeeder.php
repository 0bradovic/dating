<?php

use Illuminate\Database\Seeder;
use App\TransactionType;
use App\EmployeeType;
use App\ClientType;
use App\ClientMatch;
use App\EmployeePersonality;
use App\Interest;
use App\EmployeeInterest;
use App\ClientPersonality;
use App\Hair;
use App\Employee;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        EmployeeType::create(['name' => 'standard']);
        EmployeeType::create(['name' => 'premium']);
        EmployeeType::create(['name' => 'vip']);

        ClientType::create(['name' => 'standard']);
        ClientType::create(['name' => 'premium']);
        ClientType::create(['name' => 'vip']);

       // factory('App\Employee', 1)->create();
        factory('App\Client', 1)->create();
        factory('App\Admin', 1)->create();

        for($i=0;$i<21;$i++)
        {
            Employee::create([
                'username' => 'Employee'.$i,
                'password' => bcrypt('Employee1'),
                'email' => 'employee'.$i.'@email.com',
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'nickname' => 'Janey',
                'looking_for' => 'Male',
                'date_of_birth' => Carbon::now(),
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
            ]);
        }


        TransactionType::create(['name' => 'chat', 'credit_amount' => '1']);
        TransactionType::create(['name' => 'video', 'credit_amount' => '2']);
        TransactionType::create(['name' => 'photo', 'credit_amount' => '15']);
        TransactionType::create(['name' => 'message', 'credit_amount' => '10']);
        TransactionType::create(['name' => 'gift', 'credit_amount' => '20']);

        ClientMatch::create(['client_id' => '1', 'date_of_birth' => date('20010101'), 'height' => '1.5', 'weight' => '50', 'body_type' => 'Fit', 'education' => 'High School', 'smoking' => 'Light smoker', 'drinking' => 'Heavy drinker', 'eye_color' => 'Blue','hair_color' => 'Black','nationality' => 'Serbia']);

        ClientPersonality::create(['client_id' => '1', 'loving' => '100', 'confident' => '5', 'successful' => '50', 'faithful' => '10', 'flirty' => '25', 'compassionate' => '75', 'extroverted' => '30', 'caring' => '0', 'patient' => '25', 'adventurous' => '65', 'healthy_lifestyle' => '80']);
        
        EmployeePersonality::create(['employee_id' => '1', 'loving' => '100', 'confident' => '10', 'successful' => '100', 'faithful' => '50', 'flirty' => '90', 'compassionate' => '75', 'extroverted' => '35', 'caring' => '40', 'patient' => '95', 'adventurous' => '80', 'healthy_lifestyle' => '80']);

        Interest::create(['name' => 'biking']);
        Interest::create(['name' => 'camping']);
        Interest::create(['name' => 'cars']);
        Interest::create(['name' => 'cooking']);
        Interest::create(['name' => 'dancing']);
        Interest::create(['name' => 'diving']);
        Interest::create(['name' => 'fashion']);
        Interest::create(['name' => 'fishing']);
        Interest::create(['name' => 'games']);

        Hair::create(['name' => 'black']);
        Hair::create(['name' => 'blonde']);
        Hair::create(['name' => 'red']);
        Hair::create(['name' => 'green']);
        Hair::create(['name' => 'brunette']);
        
        EmployeeInterest::create(['employee_id' => '1', 'interest_id' => '3']);
        EmployeeInterest::create(['employee_id' => '1', 'interest_id' => '5']);
        EmployeeInterest::create(['employee_id' => '1', 'interest_id' => '6']);
        EmployeeInterest::create(['employee_id' => '1', 'interest_id' => '7']);

    }
}

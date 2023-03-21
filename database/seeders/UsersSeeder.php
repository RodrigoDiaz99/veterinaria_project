<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'names' => 'PEDRO ADRIAN',
            'father_last_name' => 'SANCHEZ',
            'mother_last_name' => 'CARDENAS',
            'email' => 'pedrosanchezcardenas@gmail.com',
            'phone' => '9999708319',
            'password' => '$2y$10$TeW69OUnwXxLH2Z0xiZvJ.9jYTfUSLkwnI5chwbFptYr7tkMazzwu',
        ]);
        
        User::create([
            'names' => 'MÁRIA FERNANDA',
            'father_last_name' => 'HEVIA',
            'mother_last_name' => 'LARA',
            'email' => 'fernandahevia98@gmail.com',
            'phone' => '9993641079',
            'password' => '$2y$10$TeW69OUnwXxLH2Z0xiZvJ.9jYTfUSLkwnI5chwbFptYr7tkMazzwu',
        ]);

        User::create([
            'names' => 'EVELYN GUADALUPE',
            'father_last_name' => 'NIÑO',
            'mother_last_name' => 'RODRIGUEZ',
            'email' => 'rodriguezevelyn828@gmail.com',
            'phone' => '9991349474',
            'password' => '$2y$10$TeW69OUnwXxLH2Z0xiZvJ.9jYTfUSLkwnI5chwbFptYr7tkMazzwu',
        ]);
    }
}

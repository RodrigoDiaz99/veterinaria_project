<?php

namespace Database\Seeders;

use App\Models\typeOfAppointmentModel;
use Illuminate\Database\Seeder;

class TypeAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        typeOfAppointmentModel::create([
            'type' => 'BAÑO'
        ]);

        typeOfAppointmentModel::create([
            'type' => 'DESPARACITACIÓN'
        ]);

        typeOfAppointmentModel::create([
            'type' => 'ESTETICA'
        ]);
    }
}

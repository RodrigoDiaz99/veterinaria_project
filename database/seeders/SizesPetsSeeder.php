<?php

namespace Database\Seeders;

use App\Models\sizesPetsModel;
use Illuminate\Database\Seeder;

class SizesPetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sizesPetsModel::create([
            'size' => 'CH/M'
        ]);

        sizesPetsModel::create([
            'size' => 'G'
        ]);

        sizesPetsModel::create([
            'size' => 'XG'
        ]);
    }
}

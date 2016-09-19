<?php

use App\Models\PointOfInterestType;
use Illuminate\Database\Seeder;

class PointOfInterestTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Parkering'],
            ['name' => 'Café'],
            ['name' => 'Mack'],
            ['name' => 'Camping'],
            ['name' => 'Badplats']
        ];

        PointOfInterestType::insert($types);
    }
}

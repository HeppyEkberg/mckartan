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
            ['name' => 'Parkering', 'icon' => '/gfx/icons/parkinggarage.png'],
            ['name' => 'Café', 'icon' => '/gfx/icons/coffee.png'],
            ['name' => 'Mack', 'icon' => '/gfx/icons/fillingstation.png'],
            ['name' => 'Camping', 'icon' => '/gfx/icons/campfire-2.png'],
            ['name' => 'Badplats', 'icon' => '/gfx/icons/beach.png'],
            ['name' => 'Verkstad', 'icon' => '/gfx/icons/workshop.png'],
            ['name' => 'MC Butik', 'icon' => '/gfx/icons/motorcycle.png'],
            ['name' => 'Sevärdhet', 'icon' => '/gfx/icons/sight-2.png'],
        ];

        PointOfInterestType::insert($types);
    }
}

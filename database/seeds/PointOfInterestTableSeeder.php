<?php

use App\Models\PointOfInterest;
use App\User;
use Illuminate\Database\Seeder;

class PointOfInterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        $points = [
            ['latitud' => 57.7081, 'longitud' => 11.9761, 'pointOfInterestType_id' => 1, 'createdBy_id' => $user->id],
            ['latitud' => 57.6996, 'longitud' => 11.9676, 'pointOfInterestType_id' => 1, 'createdBy_id' => $user->id],
            ['latitud' => 57.6975, 'longitud' => 11.9916, 'pointOfInterestType_id' => 1, 'createdBy_id' => $user->id],
            ['latitud' => 57.6920, 'longitud' => 11.9938, 'pointOfInterestType_id' => 1, 'createdBy_id' => $user->id],
            ['latitud' => 57.6985, 'longitud' => 11.9867, 'pointOfInterestType_id' => 1, 'createdBy_id' => $user->id],
        ];

        PointOfInterest::insert($points);


    }
}

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
        $pointOfInterests = file_get_contents(database_path('seed_data/pointofinterests.json'));
        $pointOfInterests = json_decode($pointOfInterests);
        $points = [];
        foreach($pointOfInterests->rows as $row) {
            $points[] = (array) $row;
        }

        PointOfInterest::insert($points);


    }
}

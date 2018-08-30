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
        $this->new();
    }

    private function old() {
        $pointOfInterests = file_get_contents(database_path('seed_data/pointofinterests.json'));
        $pointOfInterests = json_decode($pointOfInterests);
        $points = [];
        foreach($pointOfInterests->rows as $row) {
            $points[] = (array) $row;
        }

        PointOfInterest::insert($points);

    }

    private function new() {
        $points_data = file_get_contents(database_path('seed_data/points_new.json'));
        $points_data = json_decode($points_data);

        $points = [];
        foreach($points_data as $point_data) {
            $points[] = array_except((array) $point_data, ['type']);
        }

        PointOfInterest::insert($points);
    }

}

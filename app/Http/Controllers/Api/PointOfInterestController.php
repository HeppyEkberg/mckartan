<?php namespace App\Http\Controllers\Api;

use App\Models\PointOfInterest;

class PointOfInterestController
{

    public function getPointsOfInterests() {
        return PointOfInterest::all();
    }

}
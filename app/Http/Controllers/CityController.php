<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\PointOfInterest;
use App\Models\Route;

class CityController extends Controller
{

    public function show(City $city)
    {
        $pointOfInterests = PointOfInterest::all();
        $mapCoordinates = $city->mapCoordinates();

        return view('home', compact('pointOfInterests', 'mapCoordinates'));
    }

}

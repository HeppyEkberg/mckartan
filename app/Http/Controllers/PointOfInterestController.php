<?php namespace App\Http\Controllers;


use App\Models\PointOfInterest;
use Illuminate\Support\Facades\Auth;

class PointOfInterestController extends Controller
{

    public function show($pointOfInterest_id)
    {
        $point = PointOfInterest::find($pointOfInterest_id);
        $pointOfInterests = PointOfInterest::all();
        $user = Auth::user();

        $mapLocation = [
            'latitud' => $point->latitud,
            'longitud' => $point->longitud,
            'zoom' => 14,
        ];

        return view('pointofinterest/show', compact('pointOfInterests', 'user', 'point', 'mapLocation'));
    }

}

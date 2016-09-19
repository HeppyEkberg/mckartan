<?php namespace App\Http\Controllers\Api;

use App\Models\PointOfInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointOfInterestController
{

    public function index() {
        return PointOfInterest::with('type')->get();
    }

    public function show($pointOfInterest_id) {
        return PointOfInterest::find($pointOfInterest_id);
    }

    public function store(Request $request) {

        $latitud = $request->get('latitud');
        $longitud = $request->get('longitud');

        if($request->has('latlong')) {
            $latlong = explode(',', $request->get('latlong'));
            $latitud = floatval($latlong[0]);
            $longitud = floatval($latlong[1]);
        }

        $pointOfInterest = PointOfInterest::create([
            'name' => $request->get('name'),
            'latitud' => $latitud,
            'longitud' => $longitud,
            'description' => $request->get('description'),
            'image' => $request->get('image'),
            'website' => $request->get('website'),
            'pointOfInterestType_id' => $request->get('pointOfInterestType_id'),
            'createdBy_id' => 1,
        ]);


        if($pointOfInterest->exists) {
            return ['result' => 'success', 'id' => $pointOfInterest->id];
        }

        return ['result' => 'false'];
    }

}

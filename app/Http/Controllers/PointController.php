<?php
namespace App\Http\Controllers;

use App\MapCoordinates;
use App\Models\PointOfInterest;
use App\Models\PointOfInterestType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{

    public function show(PointOfInterest $point) {

        $mapCoordinates = new MapCoordinates();
        $mapCoordinates->longitude($point->longitude)
            ->latitude($point->latitude)
            ->zoom(14);

        // Sätter random för tillfället för att få till GUI
        $point->rating = round(rand(100, 500) / 100, 1);

        return view('pointofinterest.show', compact('point', 'mapCoordinates'));
    }

    public function create() {
        $mapCoordinates = new MapCoordinates();
        $pointTypes = PointOfInterestType::all();
        return view('point.create', compact('mapCoordinates', 'pointTypes'));
    }

    public function store(Request $request) {

        $data = $request->get('point');

        $point = new PointOfInterest();
        $point->name = $data['name'];
        $point->latitude = $data['latitude'];
        $point->longitude = $data['longitude'];
        $point->description = $data['description'];
        $point->pointOfInterestType_id = $data['type'];
        $point->user_id = Auth::id();
        $point->save();

        return redirect()->back();
    }

}

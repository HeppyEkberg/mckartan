<?php
namespace App\Http\Controllers;

use App\Http\JsonResponse;
use App\MapCoordinates;
use App\Models\Route;
use App\Models\RouteCoordinate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function show(Route $route) {
        $coordinates = $route->coordinates;

        $latitude = $coordinates->avg('latitude');
        $longitude = $coordinates->avg('longitude');

        $mapCoordinates = new MapCoordinates();
        $mapCoordinates->latitude($latitude)->longitude($longitude)->zoom(11);

        return view('route.show', compact('route', 'mapCoordinates'));
    }

    public function create() {
        $mapCoordinates = new MapCoordinates();
        return view('route.create', compact('mapCoordinates'));
    }

    public function store(Request $request) {

        if($request->has('route')) {
            $data = json_decode($request->get('route'));
        }
        else {
            $data = json_decode(file_get_contents(storage_path('app/route.json')));
        }


        $data = $data->routes[0];


        $leg = $data->legs[0];
        $route = new Route();
        $route->distance = $leg->distance->value;
        $route->duration = $leg->duration->value;
        $route->start_address = $leg->start_address;
        $route->end_address = $leg->end_address;
        $route->routeType_id = 1;
        $route->user_id = Auth::id();
        $route->rating = null;
        $route->save();

        $coordinates = [];

        foreach($data->overview_path as $key => $point) {

            // Spara bara varannan punkt så vi minskar antalet punkter som behöver laddas sedan.
            if($key % 2 == 0) {
                continue;
            }

            $coordinates[] = [
                'route_id' => $route->id,
                'longitude' => $point->lng,
                'latitude' => $point->lat,
            ];
        }

        RouteCoordinate::insert($coordinates);

        return new JsonResponse(true, trans('route.route_created'));
    }
}

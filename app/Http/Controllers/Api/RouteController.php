<?php namespace App\Http\Controllers\Api;

use App\Models\Route;
use App\Models\RouteCoordinate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RouteController
{

    public function getRoutes() {

        $routes = Cache::get('api/routes', function() {
            return Route::with('coordinates')->get();
        });

        return $routes;
    }

    public function show($route_id) {
        return Route::where('id', $route_id)->with('coordinates')->first();
    }

    public function store(Request $request) {
        $route_data = $request->get('route');
        $route = Route::create(['user_id' => 1] + $route_data);

        $coordinates = [];
        foreach($request->get('coordinates') as $coordinate) {
            $coordinates[] = ['route_id' => $route->id] + $coordinate;
        }

        RouteCoordinate::insert($coordinates);

        if($route->exists) {
            return ['result' => 'success', 'id' => $route->id];
        }

        return ['result' => 'false'];
    }

}

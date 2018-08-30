<?php

use App\Models\Route;
use App\Models\RouteCoordinate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class RouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->old();
        $this->new();
    }

    private function new() {
        $routes = file_get_contents(database_path('seed_data/routes_new.json'));
        $routes = json_decode($routes);
        $user = \App\User::first();
        Route::unguard();
        RouteCoordinate::unguard();

        foreach($routes as $route_data) {
            $route_data = (array) $route_data;
            $route = Route::insert(array_except($route_data, ['coordinates']));

            $coordinates = [];
            foreach($route_data['coordinates'] as $coordinate_data) {
                $coordinates[] = (array) $coordinate_data;
            }

            RouteCoordinate::insert($coordinates);
        }


        Route::unguard(false);
        RouteCoordinate::unguard(false);
    }

    private function old() {
        $routes = file_get_contents(database_path('seed_data/sections.json'));
        $routes = json_decode($routes);
        $user = \App\User::first();

        foreach($routes->features as $route_data) {

            $route = Route::create([
                'distance' => $route_data->properties->distance,
                'duration' => $route_data->properties->duration,
                'start_address' => $route_data->properties->start_address,
                'end_address' => $route_data->properties->end_address,
                'routeType_id' => 1,
                'user_id' => $user->id,
                'rating' => rand(0,5),
            ]);

            $coordinatesList = [];
            foreach($route_data->geometry->coordinates as $coordinates) {
                $coordinatesList[] = [
                    'route_id' => $route->id,
                    'longitude' => $coordinates[0],
                    'latitude' => $coordinates[1]
                ];
            }

            RouteCoordinate::insert($coordinatesList);
        }

    }
}

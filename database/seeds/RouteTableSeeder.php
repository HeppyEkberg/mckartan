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
                    'longitud' => $coordinates[0],
                    'latitud' => $coordinates[1]
                ];
            }

            RouteCoordinate::insert($coordinatesList);
        }


    }
}

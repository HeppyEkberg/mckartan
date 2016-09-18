<?php namespace App\Http\Controllers\Api;

use App\Models\Route;
use Illuminate\Support\Facades\Cache;

class RouteController
{

    public function getRoutes() {

        $routes = Cache::get('api/routes', function() {
            return Route::with('coordinates')->get();
        });

        return $routes;
    }

}
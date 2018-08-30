<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Route;

class RouteController extends Controller
{
    public function routes()
    {
        $routes = Route::with('coordinates')->get();
        return $routes;
    }

}

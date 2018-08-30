<?php

namespace App\Http\Controllers;

use App\MapCoordinates;
use App\Models\Route;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $mapCoordinates = new MapCoordinates();
        $routes = Route::all();

        if(is_null(Auth::user())) {
            return view('welcome', compact('mapCoordinates'));
        }

        $user = Auth::user();
        return view('home', compact('user', 'mapCoordinates', 'routes'));
    }


}

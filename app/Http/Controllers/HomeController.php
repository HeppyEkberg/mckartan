<?php

namespace App\Http\Controllers;

use App\Models\PointOfInterest;
use App\Models\Route;
use App\Models\RouteCoordinate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pointOfInterests = PointOfInterest::all();

        if(is_null(Auth::user())) {
            return view('welcome', compact('pointOfInterests'));
        }

        $user = Auth::user();
        return view('home', compact('user', 'pointOfInterests'));
    }
}

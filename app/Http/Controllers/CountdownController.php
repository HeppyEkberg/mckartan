<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\PointOfInterest;
use App\Models\Route;
use Carbon\Carbon;

class CountdownController extends Controller
{

    public function index() {
        $then = Carbon::create(null, 3, 15);

        $difference = $then->diffInDays();
        return view('countdown', compact('difference'));
    }

}

<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\PointOfInterest;

class PointController extends Controller
{
    public function points()
    {
        $points = PointOfInterest::with('type')->get();
        return $points;
    }
}

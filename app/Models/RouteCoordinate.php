<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteCoordinate extends Model
{
    protected $table = 'routeCoordinates';
    protected $fillable = ['longitud', 'latitud', 'route_id'];
    public $timestamps = false;
}
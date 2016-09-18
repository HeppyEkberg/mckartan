<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['distance', 'duration', 'start_address', 'end_address', 'routeType_id', 'user_id', 'rating'];
    public $timestamps = true;

    public function coordinates() {
        return $this->hasMany(RouteCoordinate::class);
    }
}
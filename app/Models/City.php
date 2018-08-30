<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public $timestamps = true;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function mapCoordinates() {
        return (object) $this->only(['longitude', 'latitude', 'zoom']);
    }

}

<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointOfInterest extends Model
{
    protected $table = 'pointOfInterest';
    protected $fillable = ['latitud', 'longitud', 'pointOfInterestType_id', 'createdBy_id', 'name', 'description', 'website', 'image'];
    public $timestamps = true;

    public function type() {
        return $this->belongsTo(PointOfInterestType::class, 'pointOfInterestType_id');
    }

    public function icon() {
        /** TODO: Move this to a config file, and/or to a enum definition */
        if($this->pointOfInterestType_id == 1) {
            return '/gfx/icons/parking.png';
        }
        elseif($this->pointOfInterestType_id == 2) {
            return '/gfx/icons/coffe.png';
        }
    }
}

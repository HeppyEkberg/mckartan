<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointOfInterest extends Model
{
    protected $table = 'pointOfInterest';
    protected $fillable = ['latitud', 'longitud', 'pointOfInterestType_id', 'createdBy_id', ''];
    public $timestamps = true;
}
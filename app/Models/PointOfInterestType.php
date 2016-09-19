<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointOfInterestType extends Model
{
    protected $table = 'pointOfInterestType';
    public $timestamps = false;
    
    protected $fillable = ['name'];

}

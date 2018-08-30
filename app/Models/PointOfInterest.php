<?php namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int pointOfInterestType_id
 * @property string description
 * @property double longitude
 * @property double latitude
 * @property string name
 * @property int|null user_id
 */
class PointOfInterest extends Model
{
    protected $table = 'pointOfInterest';
    protected $fillable = ['latitude', 'longitude', 'pointOfInterestType_id', 'createdBy_id', 'name', 'description', 'website', 'image'];
    public $timestamps = true;

    public function type() {
        return $this->belongsTo(PointOfInterestType::class, 'pointOfInterestType_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}

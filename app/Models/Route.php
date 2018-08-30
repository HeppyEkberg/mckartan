<?php
namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property null|int rating
 * @property int|null user_id
 * @property int routeType_id
 * @property string end_address
 * @property string start_address
 * @property int duration
 * @property int distance
 * @property mixed coordinates
 */
class Route extends Model
{
    protected $fillable = ['distance', 'duration', 'start_address', 'end_address', 'routeType_id', 'user_id', 'rating'];
    public $timestamps = true;

    public function coordinates() {
        return $this->hasMany(RouteCoordinate::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
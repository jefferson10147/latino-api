<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservations';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['start_date', 'end_date', 'approved', 'description', 'user_id'];

    protected $with = ['user', 'reservedAreas'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservedAreas()
    {
        return $this->hasMany(ReservedArea::class);
    }
}

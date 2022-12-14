<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wages';

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
    protected $fillable = ['total', 'description', 'month', 'year', 'status', 'user_id'];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

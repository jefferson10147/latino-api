<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservedArea extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reserved_areas';

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
    protected $fillable = ['reservation_id', 'area_id'];

    
}

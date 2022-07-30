<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'areas';

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
    protected $fillable = ['name', 'description', 'availability', 'price'];

    public function reservedAreas()
    {
        return $this->hasMany(ReservedArea::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}

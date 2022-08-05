<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssociateMember extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'associate_members';

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
    protected $fillable = ['name', 'last_name', 'dni', 'relationship', 'user_id'];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

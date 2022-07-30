<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/*
    IMPORTANT:

    Acording to the conventions, this model 
    Should be called New (in singular)
    But we named it on plural because New is a keyword in PHP
*/
class News extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

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
    protected $fillable = ['title', 'body'];

    public function comments()
    {
        return $this->hasMany(NewsComment::class);
    }
}

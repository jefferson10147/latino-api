<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pictures';

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
    protected $fillable = ['name', 'url', 'new_id', 'user_id', 'area_id'];

    protected $with = ['user', 'news', 'area'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
        IMPORTANT:

        According to the coventions, this method
        should be called just "new" (in singular)
        But we named it on plural because New is a keyword in PHP
        
    */
    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}

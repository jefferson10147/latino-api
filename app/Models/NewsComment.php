<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news_comments';

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
    protected $fillable = ['comment_text', 'new_id', 'user_id'];

    protected $with = ['user', 'news'];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

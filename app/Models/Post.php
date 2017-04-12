<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    public $timestamps = true;

    public function topic()
    {

        return $this->belongsTo('App\Models\Topic', 'topic_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}

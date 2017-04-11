<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    protected $table = 'topics';
    public $timestamps = true;

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'id');
    }

    public function topicStatus()
    {
        return $this->belongsTo('App\Models\TopicStatus', 'topic_status_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicStatus extends Model
{
    public function topics()
    {
        return $this->hasMany('App\Models\Topic', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forums';

    public function topics()
    {
        return $this->hasMany('App\Models\Topic', 'id');
    }

}

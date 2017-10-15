<?php

namespace App\Models;

use Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable = ['content',
    'topic_id',
    'user_id'];

    public function topic()
    {

        return $this->belongsTo('App\Models\Topic', 'topic_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function updatePost($input)
    {
        if(Gate::denies('update', $this))
            {
                abort(403, 'You do not have the correct permissions to do that.');
            }
        $this->update($input);
    }
}

<?php

namespace App\Models;
use App\Models\Topic;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forums';

    public function topics()
    {
        return $this->hasMany('App\Models\Topic');
    }

    public function createTopic($request)
    {
        $input = $request->only(['title', 'content']);
        $input['forum_id'] = $this->id;
        $input['user_id'] = Auth::id();
        $input['topic_status_id'] = 1;
        Topic::create($input->toArray());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

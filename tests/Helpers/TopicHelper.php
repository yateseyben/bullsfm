<?php
namespace Tests\Helpers;

use App\Models\Topic;

class TopicHelper
{
    /**
     * Returns a Post object
     *
     */
    public function newTopic()
    {
        return factory(Topic::class)->create();
    }
}

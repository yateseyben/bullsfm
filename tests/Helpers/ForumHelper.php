<?php
namespace Tests\Helpers;

use App\Models\Forum;

class ForumHelper
{
    /**
     * Returns a Post object
     *
     */
    public function newForum()
    {
        return factory(Forum::class)->create();
    }
}
